<?php
/**
* LP Mini Visa Guru — functions.php
* Подключение стилей и скриптов, поддержка тем.
*/

if (!defined('ABSPATH')) exit;

/**
* Подключение CSS и JS — в том же порядке, что в оригинальном index.html
*/
function lpmini_enqueue_assets() {
$theme_uri = get_template_directory_uri();
$ver       = '1.0';

// ===== CSS =====
wp_enqueue_style('lpmini-main', $theme_uri . '/css/style.css', [], $ver);
wp_enqueue_style('lpmini-font', $theme_uri . '/font/stylesheet.css', [], $ver);
wp_enqueue_style('lpmini-jgrowl', $theme_uri . '/feedback/css/jquery.jgrowl.css', [], $ver);
wp_enqueue_style('lpmini-arcticmodal', $theme_uri . '/feedback/css/jquery.arcticmodal.css', [], $ver);
wp_enqueue_style('lpmini-owl', $theme_uri . '/owlcarousel/owl.carousel.min.css', [], $ver);
wp_enqueue_style('lpmini-owl-theme', $theme_uri . '/owlcarousel/owl.theme.default.min.css', [], $ver);
wp_enqueue_style('lpmini-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css', [], null);

// ===== JS =====
// Используем jQuery 1.9.1 из исходного шаблона
wp_deregister_script('jquery');
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', [], '1.9.1', false);
wp_enqueue_script('jquery');

wp_enqueue_script('lpmini-jgrowl', $theme_uri . '/feedback/js/jquery.jgrowl.js', ['jquery'], $ver, true);
wp_enqueue_script('lpmini-arcticmodal', $theme_uri . '/feedback/js/jquery.arcticmodal.js', ['jquery'], $ver, true);
wp_enqueue_script('lpmini-feedback', $theme_uri . '/feedback/js/feedback.js', ['jquery'], $ver, true);
wp_enqueue_script('lpmini-main-js', $theme_uri . '/js/main.js', ['jquery'], $ver, true);
wp_enqueue_script('lpmini-phone', $theme_uri . '/js/phone.js', ['jquery'], $ver, true);
wp_enqueue_script('lpmini-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js', [], null, true);
wp_enqueue_script('lpmini-owl', $theme_uri . '/owlcarousel/owl.carousel.min.js', ['jquery'], $ver, true);
}
add_action('wp_enqueue_scripts', 'lpmini_enqueue_assets');

/**
* Поддержка стандартных функций темы
*/
function lpmini_theme_setup() {
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('html5', ['search-form', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'lpmini_theme_setup');

/**
* Хелпер для безопасного вывода ACF полей с дефолтом
* Используется в шаблонах: lp_field('hero_title', 'Заголовок по умолчанию')
*
* Обрабатывает разные форматы ACF image-полей:
* - Image URL (string) — возвращается как есть
* - Image ID (int) — конвертируется в URL через wp_get_attachment_url
* - Image Array — берётся ключ 'url'
* Пустые массивы и пустые значения возвращают $default.
*/
function lp_field($name, $default = '') {
if (!function_exists('get_field')) {
    return $default;
}

$value = get_field($name);

// Пустые значения → дефолт
if ($value === null || $value === '' || $value === false) {
    return $default;
}

// ACF Image как массив (Return Format: Image Array)
if (is_array($value)) {
    if (empty($value)) {
        return $default;
    }
    if (isset($value['url']) && !empty($value['url'])) {
        return $value['url'];
    }
    // Массив без url — считаем пустым
    return $default;
}

// ACF Image как ID (Return Format: Image ID) — целое число > 0
if (is_numeric($value) && (int)$value > 0) {
    // Эвристика: имя поля содержит image/logo/photo/img → конвертируем ID в URL
    $lname = strtolower($name);
    if (strpos($lname, 'image') !== false
        || strpos($lname, 'logo')  !== false
        || strpos($lname, 'photo') !== false
        || strpos($lname, 'img')   !== false
        || strpos($lname, 'avatar')!== false
        || strpos($lname, 'icon')  !== false) {
        $url = wp_get_attachment_url((int)$value);
        return $url ? $url : $default;
    }
}

return $value;
}

function lp_the_field($name, $default = '') {
echo lp_field($name, $default);
}

/**
* Уведомление если ACF не установлен
*/
function lpmini_acf_check() {
if (!function_exists('get_field') && current_user_can('activate_plugins')) {
    echo '<div class="notice notice-warning"><p><strong>LP Mini тема:</strong> Для редактирования контента установите плагин <a href="' . admin_url('plugin-install.php?s=advanced+custom+fields&tab=search') . '">Advanced Custom Fields</a>.</p></div>';
}
}
add_action('admin_notices', 'lpmini_acf_check');
