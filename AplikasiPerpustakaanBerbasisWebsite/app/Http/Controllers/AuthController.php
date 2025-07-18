<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

//------------------------------::::::::::::::::::::------------------------------\\

//------------------------------::::::::::::::::::::------------------------------\\
include "config/koneksi.php";

if (isset($_GET['aksi']) && $_GET['aksi'] == "masuk") {


    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($data);

        if ($row['role'] == "Admin") {
            // Jika level user yang login adalah admin maka arahkan user ke halaman admin
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['status'] = "Login";
            $_SESSION['level'] = "Admin";

            // 
            date_default_timezone_set('Asia/Jakarta');

            $id_user = $_SESSION['id_user'];
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');

            $query = "UPDATE user SET terakhir_login = '$tanggal ( $jam )'";
            $query .= "WHERE id_user = $id_user";

            $sql = mysqli_query($koneksi, $query);

            header("location: ../admin");
        } else if ($row['role'] == "Anggota") {
            // Jika level user yang login adalah user maka arahkan user kehalaman user
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['level'] = "Anggota";
            $_SESSION['status'] = "Login";

            // 
            date_default_timezone_set('Asia/Jakarta');

            $id_user = $_SESSION['id_user'];
            $tanggal = date('d-m-Y');
            $jam = date('H:i:s');

            $query = "UPDATE user SET terakhir_login = '$tanggal ( $jam )'";
            $query .= "WHERE id_user = $id_user";

            $sql = mysqli_query($koneksi, $query);

            header("location: ../user");
        } else {
            // JIka login gagal tampilkan sebuah pesan gagal login melalui session
            // Dan aktifkan session pada halaman login
            $_SESSION['user_tidak_terdaftar'] = "Maaf, User tidak terdaftar pada database !!";

            header("location: ../masuk");
        }
    } else {
        // JIka login gagal tampilkan sebuah pesan gagal login melalui session
        // Dan aktifkan session pada halaman login
        $_SESSION['gagal_login'] = "Nama Pengguna atau Kata Sandi salah !!";

        header("location: ../masuk");
    }
}  elseif (isset($_GET['aksi']) && $_GET['aksi'] == "daftar") {

    $fullname = $_POST['funame'];
    $username = addslashes(strtolower($_POST['uname']));
    $username1 = str_replace(' ', '', $username);
    $password = $_POST['passw'];
    $kls = $_POST['kelas'];
    $jrs = $_POST['jurusan'];
    $kelas = $kls . $jrs;
    $alamat = $_POST['alamat'];
    $verif = "Tidak";
    $role = "Anggota";
    $join_date = date('d-m-Y');

    $query = mysqli_query($koneksi, "SELECT max(kode_user) as kodeTerakhir FROM user");
    $data = mysqli_fetch_array($query);
    $kodeTerakhir = $data['kodeTerakhir'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeTerakhir, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "AP";
    $Anggota = $huruf . sprintf("%03s", $urutan);

    $sql = "INSERT INTO user(kode_user,nis,fullname,username,password,kelas,alamat,verif,role,join_date)
            VALUES('" . $Anggota . "','" . $nis . "','" . $fullname . "','" . $username1 . "','" . $password . "','" . $kelas . "','" . $alamat . "','" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Pendaftaran Berhasil !";
        header("location: ../masuk");
    } else {
        $_SESSION['gagal'] = "Pendaftaran Gagal !";
        header("location: ../masuk");
    }
}

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Ganti sesuai nama kolom di database
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        session::flash('gagal_login', 'Username atau password salah!');
        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Sesuaikan dengan lokasi file blade-mu
    }

    public function showRegister()
    {
        $identitas = DB::table('identitas')->first();
    return view('auth.register', compact('identitas'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'funame' => 'required|string|max:255',
            'uname' => 'required|string|max:100|unique:users,username',
            'passw' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->funame,
            'username' => $request->uname,
            'password' => Hash::make($request->passw),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }
    // public function showLogin($role = null) {
    //     if ($role === 'admin') {
    //         return view('auth.login-admin', compact('role'));
    //     } elseif ($role === 'siswa') {
    //         return view('auth.login-siswa', compact('role'));
    //     } else {
    //         abort(404); // atau bisa redirect ke login default
    //     }
    // }
    

    // public function login(Request $request) {
    //     $credentials = $request->only('email', 'password');
    //     $role = $request->input('role');
    
    //     $user = User::where('email', $credentials['email'])->first();
    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         if ($role && $user->role !== $role) {
    //             return back()->withErrors(['email' => 'Role tidak cocok']);
    //         }
    
    //         Auth::login($user);
    //         // ⛳️ Ubah redirect ke eperpus, tidak lagi ke dashboard
    //         return redirect()->route('eperpus');
    //     }
    
    //     return back()->withErrors(['email' => 'Email atau password salah']);
    // }
    

    // public function showRegister() {
    //     return view('auth.register');
    // }

    // public function register(Request $request) {
        
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|confirmed',
    //         'role' => 'required|in:admin,siswa'
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'role' => $request->role,
    //     ]);

    //     return redirect()->route('login', ['role' => $request->role])->with('success', 'Registrasi berhasil, silakan login.');
    // }

    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('/');
    // }

    public function show($id)
{
    $book = Book::findOrFail($id);
    return view('eperpus.detail', compact('book'));
}




}
