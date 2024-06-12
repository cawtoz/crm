<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = json_decode(file_get_contents('content.json'), true);

    // Hero Section
    $content['hero']['title'] = $_POST['hero_title'];
    $content['hero']['description'] = $_POST['hero_description'];
    $content['hero']['button'] = $_POST['hero_button'];

    // Features Section
    $content['features']['title'] = $_POST['features_title'];
    foreach ($content['features']['cards'] as $index => $card) {
        $content['features']['cards'][$index]['image'] = $_POST["feature_image_$index"];
        $content['features']['cards'][$index]['title'] = $_POST["feature_title_$index"];
        $content['features']['cards'][$index]['description'] = $_POST["feature_description_$index"];
    }

    // Benefits Section
    $content['benefits']['title'] = $_POST['benefits_title'];
    $content['benefits']['description'] = $_POST['benefits_description'];
    $content['benefits']['image'] = $_POST['benefits_image'];
    foreach ($content['benefits']['list'] as $index => $item) {
        $content['benefits']['list'][$index] = $_POST["benefits_list_$index"];
    }

    // CTA Section
    $content['cta']['title'] = $_POST['cta_title'];
    $content['cta']['description'] = $_POST['cta_description'];
    $content['cta']['button'] = $_POST['cta_button'];
    $content['cta']['image'] = $_POST['cta_image'];

    // About Us Section
    $content['about']['title'] = $_POST['about_title'];
    $content['about']['description'] = $_POST['about_description'];
    $content['about']['image'] = $_POST['about_image'];
    foreach ($content['about']['list'] as $index => $item) {
        $content['about']['list'][$index] = $_POST["about_list_$index"];
    }

    file_put_contents('content.json', json_encode($content, JSON_PRETTY_PRINT));

    header("Location: admin.php");
    exit();
}
?>
