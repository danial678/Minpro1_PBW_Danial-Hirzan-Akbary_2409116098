<?php
require_once 'koneksi.php';

$query_profil = "SELECT * FROM profil LIMIT 1";
$result_profil = mysqli_query($conn, $query_profil);
$profil = mysqli_fetch_assoc($result_profil);

$query_hobbies = "SELECT * FROM hobbies ORDER BY urutan ASC";
$result_hobbies = mysqli_query($conn, $query_hobbies);

$query_skills = "SELECT * FROM skills ORDER BY urutan ASC";
$result_skills = mysqli_query($conn, $query_skills);

$query_sertifikat = "SELECT * FROM sertifikat ORDER BY urutan ASC";
$result_sertifikat = mysqli_query($conn, $query_sertifikat);

$foto_profil = "assets/image/profile.jpeg";
$pdf_sertifikat = [
    "assets/pdf/insevent.pdf",
    "assets/pdf/biro.pdf", 
    "assets/pdf/aplikasi.pdf"
];

$icon_hobby = [
    'olahraga' => 'fas fa-futbol',
    'seni' => 'fas fa-paint-brush',
    'game' => 'fas fa-gamepad',
    'sosial' => 'fas fa-users',
    'travel' => 'fas fa-plane',
    'makan' => 'fas fa-utensils',
    'tidur' => 'fas fa-bed',
    'ngopi' => 'fas fa-coffee'
];

$icon_skill = [
    'tidur' => 'fas fa-bed',
    'ngoding' => 'fab fa-css3-alt',
    'travel' => 'fas fa-plane',
    'ngomong' => 'fas fa-users',
    'speak' => 'fas fa-microphone',
    'team' => 'fas fa-users'
];

$icon_sertifikat = [
    'organisasi' => 'fas fa-users',
    'kompetisi' => 'fas fa-trophy',
    'kursus' => 'fas fa-graduation-cap'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $profil['nama_lengkap']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-text">DANIAL</div>
            <input type="checkbox" id="nav-toggle" class="nav-toggle">
            <label for="nav-toggle" class="nav-toggle-label">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#certificates" class="nav-link">Certificates</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-left">
                    <?php
                    $nama_parts = explode(' ', $profil['nama_lengkap'], 2);
                    $nama_depan = $nama_parts[0];
                    $nama_belakang = isset($nama_parts[1]) ? $nama_parts[1] : '';
                    ?>
                    <h1 class="hero-name"><?php echo $nama_depan; ?> <span><?php echo $nama_belakang; ?></span></h1>
                    <p class="hero-role"><?php echo $profil['role']; ?></p>
                    <p class="hero-desc"><?php echo nl2br($profil['deskripsi']); ?></p>
                    <div class="hero-buttons">
                        <a href="#about" class="btn btn-primary">Lihat Profil</a>
                        <a href="#certificates" class="btn btn-secondary">Sertifikat</a>
                    </div>
                </div>
                <div class="hero-right">
                    <img src="<?php echo $foto_profil; ?>" alt="<?php echo $profil['nama_lengkap']; ?>" class="profile-img">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">Tentang Saya</h2>
            <p class="about-text">
                Saya adalah mahasiswa Sistem Informasi yang aktif dan kreatif. 
                Di luar kuliah, saya menikmati berbagai aktivitas yang membuat hidup lebih berwarna.
            </p>

            <div class="hobbies-list">
                <?php while ($hobby = mysqli_fetch_assoc($result_hobbies)) : 
                    $jenis = $hobby['jenis'];
                    $icon_class = isset($icon_hobby[$jenis]) ? $icon_hobby[$jenis] : 'fas fa-circle';
                ?>
                    <div class="hobby-item">
                        <i class="<?php echo $icon_class; ?>"></i>
                        <span><?php echo $hobby['nama_hobby']; ?></span>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="skills-section">
                <h3 class="skills-title">Skills</h3>
                <div class="skills-grid">
                    <?php while ($skill = mysqli_fetch_assoc($result_skills)) : 
                        $jenis = $skill['jenis'];
                        $icon_class = isset($icon_skill[$jenis]) ? $icon_skill[$jenis] : 'fas fa-circle';
                    ?>
                        <div class="skill-card">
                            <div class="skill-icon">
                                <i class="<?php echo $icon_class; ?>"></i>
                            </div>
                            <div class="skill-name"><?php echo $skill['nama_skill']; ?></div>
                            <div class="skill-bar-bg">
                                <div class="skill-fill" style="width: <?php echo $skill['persentase']; ?>%"></div>
                            </div>
                            <div class="skill-percent"><?php echo $skill['persentase']; ?>%</div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="certificates" class="certificates">
        <div class="container">
            <h2 class="section-title">Sertifikat</h2>
            <div class="cert-grid">
                <?php 
                $index = 0;
                while ($sertif = mysqli_fetch_assoc($result_sertifikat)) : 
                    $jenis = $sertif['jenis'];
                    $icon_class = isset($icon_sertifikat[$jenis]) ? $icon_sertifikat[$jenis] : 'fas fa-certificate';
                ?>
                    <div class="cert-card">
                        <div class="cert-header">
                            <div class="cert-badge">
                                <i class="<?php echo $icon_class; ?>"></i>
                            </div>
                        </div>
                        <div class="cert-body">
                            <h3 class="cert-title"><?php echo $sertif['judul']; ?></h3>
                            <p class="cert-issuer"><?php echo $sertif['penerbit']; ?></p>
                            <p class="cert-year"><?php echo $sertif['tahun']; ?></p>
                            <a href="<?php echo $pdf_sertifikat[$index]; ?>" target="_blank" class="cert-btn">Lihat Sertifikat</a>
                        </div>
                    </div>
                <?php 
                    $index++;
                endwhile; 
                ?>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="footer-text">&copy; <?php echo $profil['tahun_copyright']; ?> <?php echo $profil['nama_lengkap']; ?></p>
        </div>
    </footer>
</body>
</html>

<?php mysqli_close($conn); ?>