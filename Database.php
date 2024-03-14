<?php

class Database {

    private $db = null;
    public $error = false;

    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }
    public function updateJogosultsag($username, $newJogosultsag) {
    $stmt = $this->db->prepare("UPDATE `users` SET `jogosultsag` = ? WHERE `username` = ?");
    $stmt->bind_param("ss", $newJogosultsag, $username);
    
    if ($stmt->execute()) {
        return true; // Sikeres frissítés
    } else {
        return false; // Sikertelen frissítés
    }
}
    public function osszesUser() {
        $result = $this->db->query("SELECT * FROM `users`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function osszesAdat() {
        $result = $this->db->query("SELECT DISTINCT marka, uzemanyag,szszam FROM `jarmuvek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function osszesAuto() {
        $result = $this->db->query("SELECT * FROM `jarmuvek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuto($id) {
        $result = $this->db->query("SELECT * FROM `jarmuvek` WHERE id = " . $id);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($userName) {
        $sql = "SELECT * FROM `users` WHERE `username` LIKE '$userName'";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getKiemeltAjanlatok() {
        $result = $this->db->query("SELECT * FROM `jarmuvek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMarka() {
        $result = $this->db->query("SELECT DISTINCT `marka` FROM `jarmuvek` WHERE 1 ORDER BY 1;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUzemanyag() {
        $result = $this->db->query("SELECT DISTINCT `uzemanyag` FROM `jarmuvek` WHERE 1 ORDER BY 1;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSzszam() {
        $result = $this->db->query("SELECT DISTINCT `szszam` FROM `jarmuvek` WHERE 1 ORDER BY 1;");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function foglalas($id) {
        $stmt = $this->db->prepare("UPDATE jarmuvek SET foglalas = 1 WHERE id = " . $id);
        if ($stmt->execute()) {
            header("Location: index.php?menu=fooldal");
            echo '<script type="text/javascript"> window.onload = function () { alert("Sikeres foglalás!"); <script>';
        } else {
            echo '<script type="text/javascript"> window.onload = function () { alert("Sikertelen foglalás!"); <script>';
        }
    }

    public function szures() {
        // Ellenőrizze, hogy a form elküldte-e az adatokat
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ellenőrizze, hogy az összes szükséges mezőt kitöltötték-e
            if (isset($_POST['marka']) && isset($_POST['uzemanyag']) && isset($_POST['szszam'])) {
                // Vegye le az extra szóközöket és speciális karaktereket
                $marka = $this->db->real_escape_string(trim($_POST['marka']));
                $uzemanyag = $this->db->real_escape_string(trim($_POST['uzemanyag']));
                $szszam = $this->db->real_escape_string(trim($_POST['szszam']));

                // Készítse el a SQL lekérdezést LIKE segítségével
                $query = "SELECT * FROM `jarmuvek` WHERE 
                      `marka` LIKE '%$marka%' AND 
                      `uzemanyag` LIKE '%$uzemanyag%' AND 
                      `szszam` LIKE '%$szszam%'";

                // Futtassa a lekérdezést
                $result = $this->db->query($query);

                // Ellenőrizze, hogy van-e eredmény
                if ($result !== false && $result->num_rows > 0) {
                    // Ha van eredmény, adja vissza az asszociatív tömböt
                    return $result->fetch_all(MYSQLI_ASSOC);
                } else {
                    // Ha nincs eredmény, irányítsa át a felhasználót a noresult.php fájlra
                    header("Location: ./index.php?menu=noresult");
                    exit();
                }
            }
        }

        // Ha nincsenek megfelelő adatok vagy a form nincs elküldve, adjon vissza üres tömböt vagy más jelzőt
        return [];
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT `username`, `password` FROM `users` WHERE `username` LIKE ?;");
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['InputUsername'] = $row['username'];
                $_SESSION['login'] = true;
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['InputUsername'] = '';
                $_SESSION['login'] = false;
                header("Location: index.php?menu=bejelentkezes");
                exit();
            }
            $result->free_result();
        }
        return false;
    }

    public function register($email, $username, $password, $sziszam, $lakcim, $jogossz) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind the SQL statement 
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, sziszam, lakcim, jogossz) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $password, $sziszam, $lakcim, $jogossz);

// Execute the SQL statement 
        if ($stmt->execute()) {
            echo '<script type="text/javascript"> window.onload = function () { alert("Welcome at c-sharpcorner.com."); <script>';
            header("Location: index.php?menu=login");
        } else {
            echo "Error: " . $stmt->error;
        }

// Close the connection 
        $stmt->close();
    }
}

?>
