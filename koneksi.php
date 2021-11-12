<?php

$conn = mysqli_connect("localhost", "root", "", "chatbot");
if (!$conn) {
    die('Tidak bisa terhubung dengan database');
}