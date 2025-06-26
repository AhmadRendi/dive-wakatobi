<?php

session_start();

class Testimoni extends Controller
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['email'];
            $rating = (int)$_POST['rating'];
            $comment = htmlspecialchars($_POST['komentar']);

            $model = $this->model('Testimonis');

            $result = $model->addTestimonial($email, $rating, $comment);

            header('Location: ' . BASEURL . '/Home');
            exit;
            // if ($this->model('Testimoni_model')->addTestimonial($name, $rating, $comment)) {
            //     Flasher::setFlash('success', 'Testimonial added successfully.');
            // } else {
            //     Flasher::setFlash('error', 'Failed to add testimonial.');
            // }
            // header('Location: ' . BASEURL . '/testimoni');
            // exit;
        }
    }
}