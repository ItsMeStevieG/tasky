<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/headscripts.twig */
class __TwigTemplate_dd951ff4a52fabfa03f2a0d714ed1887 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"assets/img/apple-touch-icon.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"assets/img/favicon-32x32.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"assets/img/favicon-16x16.png\">
<link rel=\"manifest\" href=\"assets/img/site.webmanifest\">
<style>
    :root {
        /* Light mode variables */
        --bg-color: #f8f9fa;
        --text-color: #212529;
        --card-bg: #ffffff;
        --card-header-bg: #f1f3f5;
        --navbar-bg: #343a40;
        --navbar-text: #ffffff;
        --table-stripe: #f2f2f2;
        --table-header-bg: #e9ecef;
        --primary-btn: #007bff;
        --primary-btn-hover: #0056b3;
        --shadow: rgba(0, 0, 0, 0.1);
        --input-bg: #ffffff;
        --input-text: #212529;
        --input-border: #ced4da;
        --modal-bg: #ffffff;
        /* White background for light mode */
        --modal-text: #212529;
        /* Dark text for light mode */
    }

    [data-theme=\"dark\"] {
        /* Dark mode variables */
        --bg-color: #212529;
        --text-color: #e9ecef;
        --card-bg: #2c3034;
        --card-header-bg: #25292d;
        --navbar-bg: #1a1d20;
        --navbar-text: #e9ecef;
        --table-stripe: #2c3034;
        --table-header-bg: #25292d;
        --primary-btn: #0d6efd;
        --primary-btn-hover: #0a58ca;
        --shadow: rgba(255, 255, 255, 0.1);
        --input-bg: #495057;
        --input-text: #e9ecef;
        --input-border: #6c757d;
        --modal-bg: #2c3034;
        /* Match card background for consistency in dark mode */
        --modal-text: #e9ecef;
        /* Ensure readable text in dark mode */
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        font-family: 'Segoe UI', Arial, sans-serif;
        transition: background-color 0.3s, color 0.3s;
    }

    .card {
        background-color: var(--card-bg);
        box-shadow: 0 4px 8px var(--shadow);
        border-radius: 10px;
        transition: background-color 0.3s;
    }

    .card-header {
        background-color: var(--card-header-bg);
        border-bottom: 1px solid var(--input-border);
        color: var(--text-color);
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }

    .card-body {
        color: var(--text-color);
    }

    .card-body p {
        color: var(--text-color);
    }

    .modal-content {
        background-color: var(--modal-bg);
        color: var(--modal-text);
        transition: background-color 0.3s, color 0.3s;
    }

    .modal-header .modal-title,
    .modal-body .form-label {
        color: var(--modal-text);
    }

    .modal-body .form-control {
        background-color: var(--input-bg);
        color: var(--input-text);
        border-color: var(--input-border);
    }

    .navbar {
        background-color: var(--navbar-bg);
        box-shadow: 0 2px 4px var(--shadow);
        transition: background-color 0.3s;
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.6rem;
        color: var(--navbar-text);
    }

    .navbar-nav .nav-link {
        color: var(--navbar-text);
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
        color: #ccc;
    }

    .table {
        color: var(--text-color);
        transition: color 0.3s;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: var(--table-stripe);
        transition: background-color 0.3s;
    }

    .table thead th {
        background-color: var(--table-header-bg);
        color: var(--text-color);
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary {
        background-color: var(--primary-btn);
        border-color: var(--primary-btn);
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--primary-btn-hover);
        border-color: var(--primary-btn-hover);
    }

    .btn-success,
    .btn-danger {
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .form-label {
        color: var(--text-color);
    }

    .form-control,
    .form-select {
        background-color: var(--input-bg);
        color: var(--input-text);
        border-color: var(--input-border);
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    }

    .form-check-input {
        background-color: var(--input-bg);
        border-color: var(--input-border);
        transition: background-color 0.3s, border-color 0.3s;
    }

    .form-check-input:checked {
        background-color: var(--primary-btn);
        border-color: var(--primary-btn);
    }

    .alert {
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s;
    }

    #themeToggle {
        border-radius: 20px;
        padding: 0.25rem 0.75rem;
    }
</style>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/headscripts.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"assets/img/apple-touch-icon.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"assets/img/favicon-32x32.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"assets/img/favicon-16x16.png\">
<link rel=\"manifest\" href=\"assets/img/site.webmanifest\">
<style>
    :root {
        /* Light mode variables */
        --bg-color: #f8f9fa;
        --text-color: #212529;
        --card-bg: #ffffff;
        --card-header-bg: #f1f3f5;
        --navbar-bg: #343a40;
        --navbar-text: #ffffff;
        --table-stripe: #f2f2f2;
        --table-header-bg: #e9ecef;
        --primary-btn: #007bff;
        --primary-btn-hover: #0056b3;
        --shadow: rgba(0, 0, 0, 0.1);
        --input-bg: #ffffff;
        --input-text: #212529;
        --input-border: #ced4da;
        --modal-bg: #ffffff;
        /* White background for light mode */
        --modal-text: #212529;
        /* Dark text for light mode */
    }

    [data-theme=\"dark\"] {
        /* Dark mode variables */
        --bg-color: #212529;
        --text-color: #e9ecef;
        --card-bg: #2c3034;
        --card-header-bg: #25292d;
        --navbar-bg: #1a1d20;
        --navbar-text: #e9ecef;
        --table-stripe: #2c3034;
        --table-header-bg: #25292d;
        --primary-btn: #0d6efd;
        --primary-btn-hover: #0a58ca;
        --shadow: rgba(255, 255, 255, 0.1);
        --input-bg: #495057;
        --input-text: #e9ecef;
        --input-border: #6c757d;
        --modal-bg: #2c3034;
        /* Match card background for consistency in dark mode */
        --modal-text: #e9ecef;
        /* Ensure readable text in dark mode */
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        font-family: 'Segoe UI', Arial, sans-serif;
        transition: background-color 0.3s, color 0.3s;
    }

    .card {
        background-color: var(--card-bg);
        box-shadow: 0 4px 8px var(--shadow);
        border-radius: 10px;
        transition: background-color 0.3s;
    }

    .card-header {
        background-color: var(--card-header-bg);
        border-bottom: 1px solid var(--input-border);
        color: var(--text-color);
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }

    .card-body {
        color: var(--text-color);
    }

    .card-body p {
        color: var(--text-color);
    }

    .modal-content {
        background-color: var(--modal-bg);
        color: var(--modal-text);
        transition: background-color 0.3s, color 0.3s;
    }

    .modal-header .modal-title,
    .modal-body .form-label {
        color: var(--modal-text);
    }

    .modal-body .form-control {
        background-color: var(--input-bg);
        color: var(--input-text);
        border-color: var(--input-border);
    }

    .navbar {
        background-color: var(--navbar-bg);
        box-shadow: 0 2px 4px var(--shadow);
        transition: background-color 0.3s;
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.6rem;
        color: var(--navbar-text);
    }

    .navbar-nav .nav-link {
        color: var(--navbar-text);
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
        color: #ccc;
    }

    .table {
        color: var(--text-color);
        transition: color 0.3s;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: var(--table-stripe);
        transition: background-color 0.3s;
    }

    .table thead th {
        background-color: var(--table-header-bg);
        color: var(--text-color);
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary {
        background-color: var(--primary-btn);
        border-color: var(--primary-btn);
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--primary-btn-hover);
        border-color: var(--primary-btn-hover);
    }

    .btn-success,
    .btn-danger {
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .form-label {
        color: var(--text-color);
    }

    .form-control,
    .form-select {
        background-color: var(--input-bg);
        color: var(--input-text);
        border-color: var(--input-border);
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    }

    .form-check-input {
        background-color: var(--input-bg);
        border-color: var(--input-border);
        transition: background-color 0.3s, border-color 0.3s;
    }

    .form-check-input:checked {
        background-color: var(--primary-btn);
        border-color: var(--primary-btn);
    }

    .alert {
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s;
    }

    #themeToggle {
        border-radius: 20px;
        padding: 0.25rem 0.75rem;
    }
</style>", "partials/headscripts.twig", "C:\\xampp\\htdocs\\tasky\\templates\\partials\\headscripts.twig");
    }
}
