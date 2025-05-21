<?php


namespace App\Services\ServiceImpl\Email;


use App\Services\JwtToken\JwtTokenService;
use App\User;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Tymon\JWTAuth\Factory;
use Tymon\JWTAuth\JWT;

class EmailServiceImpl implements EmailService
{

    public static function sendResetPasswordLink($newPassword, User|Model|Authenticatable|\stdClass $user)
    {

        try {


            // generate link reset password
            $code = time();

            $link = route('user.confirmResetPasswordLink', ['code' => $code]);

            $user->update([
                'new_password' => $newPassword,
                'reset_password_code' => $code,
                'reset_password_expired_date' => now()->addHours(1)->toDateTimeString(),
            ]);

            // Buat instance PHPMailer
            $mail = new PHPMailer(true);

            // Konfigurasi server SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.pjjpai.id'; // Atur host SMTP server, misalnya untuk Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'support@mail.pjjpai.id'; // Ganti dengan email Anda
            $mail->Password = 'rsmSjdqSN1Ps16';  // Ganti dengan password email Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Aktifkan enkripsi TLS; juga tersedia: `PHPMailer::ENCRYPTION_SMTPS`
            $mail->Port = 587; // Port SMTP untuk TLS (587), SSL (465)
            $mail->SMTPDebug = 0;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // Pengaturan email pengirim dan penerima
            $mail->setFrom('support@mail.pjjpai.id', 'Support PJJPAI.ID'); // Ganti dengan alamat email dan nama pengirim
            $mail->addAddress($user->email, $user->name); // Tambahkan penerima

            //    $mail->addReplyTo('reply-to-email@example.com', 'Nama Reply');

            // Pengaturan isi email
            $mail->isHTML(true); // Atur email dalam format HTML
            $mail->Subject = 'PJJPAI Forgot password link'; // Judul email
            $mail->Body = "Hallo, berikut adalah link reset password: $link"; // Isi HTML email
            $mail->AltBody = 'Ini adalah isi email dalam format teks biasa'; // Isi email jika tidak mendukung HTML

            // Kirim email
            $mail->send();
        } catch (Exception $e) {
//            echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
        }
    }

    public static function confirmResetPasswordLink(User|Model|Authenticatable|\stdClass $user): bool
    {
        $now = now();
        $expiredDate = Carbon::parse($user->reset_password_expired_date);

        $different = $now->diffInSeconds($expiredDate, false);

        if ($different < 0) {
            $user->update([
                'new_password' => null,
                'reset_password_code' => null,
                'reset_password_expired_date' => null,
            ]);

            return false;
        }

        $user->update([
            'password' => Hash::make($user->new_password),
            'new_password' => null,
            'reset_password_code' => null,
            'reset_password_expired_date' => null,
        ]);

        return true;
    }
}
