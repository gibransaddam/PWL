<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {

    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != '' ? $_POST['id'] : NULL;
    
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
    $domisili = isset($_POST['domisili']) ? $_POST['domisili'] : '';
   
    
    $stmt = $pdo->prepare('INSERT INTO kontak VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $nim, $domisili]);
   
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="nim">Nim</label>
        <label for="domisili">Domisili</label>
        <input type="text" name="nim" id="nim">
        <input type="text" name="domisili" id="domisili">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>