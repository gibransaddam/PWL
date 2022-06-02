<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
        $domisili = isset($_POST['domisili']) ? $_POST['domisili'] : '';
        

        $stmt = $pdo->prepare('UPDATE kontak SET id = ?, nama = ?, nim = ?, domisili = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $nim, $domisili, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }

    $stmt = $pdo->prepare('SELECT * FROM kontak WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="nim">Nim</label>
        <label for="domisili">Domisili</label>
        <input type="text" name="nim" value="<?=$contact['nim']?>" id="nim">
        <input type="text" name="domisili" value="<?=$contact['domisili']?>" id="domisili">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>