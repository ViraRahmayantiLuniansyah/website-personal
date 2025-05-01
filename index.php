<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM certificates");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio - Vira Rahmayanti</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>

<header>
  <div class="logo">Vira Rahmayanti Luniansyah</div>
  <div class="menu-toggle" id="menu-toggle">
  <i class="fas fa-bars"></i>
</div>

  <nav>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#sertifikat">Certificates</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="admin_users.php" class="btn-logout">Login Admin</a></li>
      <li><a href="logout.php" class="btn-logout">Logout</a></li>
    </ul>
  </nav>
</header>

<main>

<section id="home">
        <div class="content">
          <h2>Hello I'M, Vira Rahmayanti Luniansyah</h2>
          <h1>Junior <br> Web Developer <br> & UI Designer</h1>
          <a href="#about" class="btn">About Me</a>
        </div>
      </section>

<section id="about">
  <div class="about-container">
    <div class="about-img">
      <img src="vira about.jpg" alt="Tentang Vira" />
    </div>
    <div class="about-text">
      <h2>About Me</h2>
      <p>
        Hello, saya Vira Rahmayanti Luniansyah, lahir di Bogor 03 November 2009.
        Saya pelajar SMKN 1 Ciomas, jurusan PPLG. Seorang Web Developer dan UI Designer. 
        Hobi saya membaca novel, memasak, dan mendengarkan musik.
      </p>
      <ul>
        <li>✨ Teliti & Kreatif dalam desain</li>
        <li>💻 Mampu bekerja dengan HTML, CSS, dan JavaScript</li>
      </ul>
    </div>
  </div>
</section>

<section id="skills">
  <div class="skills-container">
    <h2>My Skills</h2>

    <div class="skill-category">
      <h3>Front-End Development</h3>
      <div class="skill-boxes">
        <div class="skill-card">
          <h4>HTML</h4>
          <p>Menguasai struktur semantik HTML untuk halaman web yang rapi.</p>
        </div>
        <div class="skill-card">
          <h4>CSS</h4>
          <p>Mendesain tampilan responsif dan menarik dengan CSS.</p>
        </div>
        <div class="skill-card">
          <h4>JavaScript</h4>
          <p>Membuat halaman interaktif dengan JavaScript dasar.</p>
        </div>
      </div>
    </div>

    <div class="skill-category">
      <h3>Back-End Development</h3>
      <div class="skill-boxes">
        <div class="skill-card">
          <h4>PHP</h4>
          <p>Mengelola proses server-side dengan PHP.</p>
        </div>
        <div class="skill-card">
          <h4>MySQL</h4>
          <p>Mengelola database dengan MySQL untuk website dinamis.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<section id="sertifikat">
  <h2>Sertifikat Saya</h2>
  <div class="certificate-slider">
    <div class="certificates">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" />
      <?php endwhile; ?>
    </div> 

  </div>
</section>

<section id="projects">
  <div class="projects-container">
    <h2>My Projects</h2>
    <div class="project-boxes">
      <div class="project-card">
        <img src="project1.jpg" alt="Project 1">
        <h4>Project 1</h4>
        <h3>Perpustakaan Online</h3>
        <p>Website Perpustakaan Online sederhana.</p>
      </div>
      <div class="project-card">
        <img src="project2.jpg" alt="Project 2">
        <h4>Project 2</h4>
        <h3>Produk Case</h3>
        <p>Website jualan case HP dan Laptop.</p>
      </div>
      <div class="project-card">
        <img src="project3.jpg" alt="Project 3">
        <h4>Project 3</h4>
        <h3>Aneka Kue Kering</h3>
        <p>Website produk Aneka Kue Kering di pasar.</p>
      </div>
    </div>
  </div>
</section>
 
<section id="contact">
  <h2>Contact <span>Me</span></h2>
  <p class="section-subtitle">Feel free to contact me if you want to collaborate!</p>

  <div class="contact-container">
    <form action="send_message.php" method="POST" class="contact-form">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Your Name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Your Email" required>

      <label for="message">Message</label>
      <textarea name="message" id="message" rows="5" placeholder="Your Message" required></textarea>

      <button type="submit">Send Message</button>
    </form>

    <div class="contact-info">
      <h3>Other Information</h3>
      <p><i class="fas fa-envelope"></i> <a href="mailto:virahmayanti09@gmail.com">virahmayanti09@gmail.com</a></p>
      <p><i class="fab fa-instagram"></i> <a href="https://www.instagram.com/shevransyh_">Instagram</a></p>
      <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/6285187808990">WhatsApp</a></p>
      <p><i class="fab fa-github"></i> <a href="https://github.com/ViraRahmayantiLuniansyah">GitHub</a></p>
      <p><i class="fab fa-tiktok"></i> <a href="https://www.tiktok.com/@asyaaa1003">TikTok</a></p>
      <p><i class="fab fa-discord"></i> <a href="https://discord.gg/prBscp6Z">Discord</a></p>
      <p><i class="fas fa-map-marker-alt"></i> <a href="https://maps.app.goo.gl/AiLT4WJRqusoD5EZ8">Bogor, Indonesia</a></p>
    </div>
  </div>
</section>

<script>
  const toggle = document.getElementById('menu-toggle');
  const nav = document.querySelector('nav');

  toggle.addEventListener('click', () => {
    nav.classList.toggle('active');
  });
</script>

</main>
<script src="script.js"></script>
</body>
</html>
