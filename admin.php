    <style>
        /* CSS stílusok */
        .scroll-container {
            width: 20%; /* A container szélessége. Állítsd be igény szerint. */
            height: 20vw; /* A container magassága. */
            overflow-y: auto; /* Engedélyezi a függőleges görgetést, ha a tartalom meghaladja a magasságot. */
            border: 1px solid #000; /* Keret a container körül. */
            padding: 15px; /* Belső térköz a szöveg és a keret között. */
            margin-left: 10vw;
        }
        #text {
            font-size: 1.5vw;
            padding-top: 3vh;
            margin-left: 10vw;
        }
        h2 {
            margin-bottom: 50px;
        }
        .container {
            text-align: center;
            overflow: hidden;
            width: 800px;
            margin: 0 auto;
        }
        .container table {
            width: 100%;
        }
        .container td, .container th {
            padding: 10px;
        }
        .container td:first-child, .container th:first-child {
            padding-left: 20px;
        }
        .container td:last-child, .container th:last-child {
            padding-right: 20px;
        }
        .container th {
            border-bottom: 1px solid #ddd;
            position: relative;
        }
    </style>
</head>
<body>
    <h2>Regisztrált felhasználók</h2>
    <div class="scroll-container">
        <table class="order-table">
            <thead>
                <tr>
                    <th>Felhasználó</th>
                    <th>E-Mail cím</th>
                    <th>Jogosultság</th>
                </tr>
            </thead>
            <?php foreach ($db->osszesUser() as $row) { ?>
                <tbody>
                    <tr>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <select onchange="jogosultsagUpdate(this.value, '<?= $row['username'] ?>')">
                                <option value="regisztrált" <?= ($row['jogosultsag'] == 'regisztrált') ? 'selected' : '' ?>>Regisztrált</option>
                                <option value="admin" <?= ($row['jogosultsag'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <button onclick="updateAccess()">Frissítés</button>
    <section class="container">
        <h2>Foglalások kezelése</h2>
        <input type="search" class="light-table-filter" data-table="order-table" placeholder="Keresés" />
        <table class="order-table">
            <thead>
                <tr>
                    <th>Felhasználó</th>
                    <th>E-Mail cím</th>
                    <th>Autó márka</th>
                    <th>Bérleti díj</th>
                    <th>Foglalás kezdete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Anna Müller</td>
                    <td>anna.mueller@gmail.com</td>
                    <td>0123456789</td>
                    <td>11000</td>
                    <td>99 Eur</td>
                </tr>
                <tr>
                    <td>Jane Vanda</td>
                    <td>jane@vanda.org</td>
                    <td>9876543210</td>
                    <td>12000</td>
                    <td>349</td>
                </tr>
                <tr>
                    <td>Alferd Penyworth</td>
                    <td>alfred@batman.com</td>
                    <td>6754328901</td>
                    <td>20000</td>
                    <td>199</td>
                </tr>
            </tbody>
        </table>
    </section>

    <script>
        function jogosultsagUpdate(newValue, felhasznalo) {
            // Küldj AJAX kérést a szervernek az adatbázis frissítéséhez
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'database.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Válasz logolása a konzolon
                } else {
                    console.error('Hiba történt a szerverrel való kommunikáció során.');
                }
            };
            xhr.send('jogosultsag=' + newValue + '&username=' + felhasznalo);
        }
    </script>