<?php
class Karyawan_model
{
    // membuat method private table
    private $table = 'dosen';
    // lalu kita simpan untuk menampung class databasenya tadi
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKaryawan()
    {
        // menjalankan query
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getKaryawanById($id)
    {
        // Mecari tau querynya apa | WHERE id=:id => untuk menyimpan data yang akan kita binding
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nidn=:nidn');
        $this->db->bind('nidn', $id);
        return $this->db->single();
    }

    public function tambahDataKaryawan($data)
    {
        // melakukan query insert datanya
        $query = "INSERT INTO dosen
        VALUES
        ('', :nama, :email, :alamat)";

        // kita jalankan querynya
        $this->db->query($query);

        // setelah di jalakan querynya tinggal di binding
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        // tinggal eksekusi
        $this->db->execute();

        // mengembalikan karena dalam method controller itu statment ifnya jika > 0 maka di return nilainya
        return $this->db->rowCount();
    }

    public function hapusDataKaryawan($id)
    {
        $query = "DELETE FROM dosen WHERE nidn = :nidn";
        // jalankan querynya 
        $this->db->query($query);
        $this->db->bind('nidn', $id);


        // di eksekusi
        $this->db->execute();

        // di cari tahu apakah ada yang terpengaruh
        return $this->db->rowCount();
    }
    public function ubahDataKaryawan($data)
    {
        // melakukan query insert datanya
        $query = "UPDATE dosen SET
         nama = :nama,
         email = :email,
         alamat = :alamat
         WHERE nidn = :nidn";


        // kita jalankan querynya
        $this->db->query($query);

        // setelah di jalakan querynya tinggal di binding
        $this->db->bind('nidn', $data['nidn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);


        // tinggal eksekusi
        $this->db->execute();

        // mengembalikan karena dalam method controller itu statment ifnya jika > 0 maka di return nilainya
        return $this->db->rowCount();
    }

    public function cariDataKaryawan()
    {
        // yang peratama kita ambil dahulu keyword data yang dikirim
        $keyword = $_POST['keyword'];

        // ketika mencari dan ada nama yang mirip kita akan tampilkan jadi jangan memakai sama dengan akan tetapi memakai LIKE
        $query = "SELECT * FROM dosen WHERE nama LIKE :keyword";

        // lalu jalankan querynya
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        // lalu nilainya di kembalikan bisa banyak menggunakan result
        return $this->db->resultSet();
    }
}
