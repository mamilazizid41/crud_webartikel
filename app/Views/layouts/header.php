<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Articles') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        body 
        .sidebar { height: 100vh; background-color: #f8f9fa; padding-top: 1rem; }
    </style>
</head>
<?php include(APPPATH . 'Views/layouts/side_nav.php'); ?>