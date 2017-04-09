<?php
foreach ($qry->result() as $row) {
    echo "<h3>" . $row->UserName . "</h2>";
}

