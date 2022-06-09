<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" type="text/css" href="styl_1.css">
</head>

<body>
    <header id="header">
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="mainLeft">
        <div id="mainLeft_top">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'mytest');
                    $query = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON lowisko.Ryby_id = ryby.id WHERE lowisko.rodzaj = 3";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){
                        echo "<li>{$row['nazwa']} pływa w rzece {$row['akwen']}, {$row['wojewodztwo']}</li>";
                    }
                    mysqli_close($conn);
                ?>
            </ol>
        </div>
        <div id="mainLeft_bottom">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'mytest');
                    $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nazwa']}</td>";
                        echo "<td>{$row['wystepowanie']}</td>";
                        echo "</tr>";
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </section>
    <section id="mainRight">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <footer id="footer">
        <p>Stronę wykonał: thCthulhu</p>
    </footer>
</body>
</html>