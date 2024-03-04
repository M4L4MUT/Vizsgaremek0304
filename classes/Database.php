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
    
public function szures(){
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
            if ($result) {
                // Ha van eredmény, adja vissza az asszociatív tömböt
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                // Ha nincs eredmény, adjon vissza üres tömböt vagy más jelzőt
                return [];
            }
        }
    }

    // Ha nincsenek megfelelő adatok vagy a form nincs elküldve, adjon vissza üres tömböt vagy más jelzőt
    return [];
}

    
    
    
    
    
public function login($username, $password) {
    try {
        $stmt = $this->db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->db->error);
        }

        $stmt->bind_param("s", $username);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $stmt->bind_result($user_id, $db_username, $db_password);
        $stmt->fetch();
        $stmt->close();

        if ($db_username) {
            if (password_verify($password, $db_password)) {
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $db_username;

                // Küldjük be a JavaScript fájlt a HEAD részbe
                echo '<script type="text/javascript" src="redirect_alert.js"></script>';
                exit;
            } else {
                throw new Exception("Incorrect password.");
            }
        } else {
            throw new Exception("User not found.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
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
