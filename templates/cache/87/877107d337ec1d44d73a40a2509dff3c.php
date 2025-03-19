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

/* base.twig */
class __TwigTemplate_9d3352f0a15cfffd92fac49129996d29 extends Template
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
            'title' => [$this, 'block_title'],
            'headscripts' => [$this, 'block_headscripts'],
            'content' => [$this, 'block_content'],
            'footscripts' => [$this, 'block_footscripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\" data-theme=\"light\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">
    ";
        // line 10
        yield from $this->unwrap()->yieldBlock('headscripts', $context, $blocks);
        // line 13
        yield "</head>

<body>
    ";
        // line 16
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "isLoggedIn", [], "any", false, false, false, 16)) {
            // line 17
            yield "    <nav class=\"navbar navbar-expand-lg\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"index.php?nav=dashboard\">Tasky</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=dashboard\">Dashboard</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=projects\">Projects</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=tags\">Tags</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=reports\">Reports</a>
                    </li>
                </ul>
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <span class=\"nav-link\">Welcome, ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["full_name"] ?? null), "html", null, true);
            yield "</span>
                    </li>
                    <li class=\"nav-item\">
                        <button id=\"themeToggle\" class=\"btn btn-outline-secondary me-2\">
                            <i id=\"themeIcon\" class=\"bi bi-sun\"></i>
                        </button>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=logout\">
                            <i class=\"bi bi-box-arrow-right me-1\"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    ";
        }
        // line 57
        yield "    <div class=\"container mt-5\">
        ";
        // line 58
        if (($context["error"] ?? null)) {
            // line 59
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 61
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 62
        yield "    </div>
    ";
        // line 63
        yield from $this->unwrap()->yieldBlock('footscripts', $context, $blocks);
        // line 69
        yield "</body>

</html>";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Tasky";
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_headscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 11
        yield "    ";
        yield from $this->loadTemplate("partials/headscripts.twig", "base.twig", 11)->unwrap()->yield($context);
        // line 12
        yield "    ";
        yield from [];
    }

    // line 61
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 63
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 64
        yield "    ";
        yield from $this->loadTemplate("partials/footscripts.twig", "base.twig", 64)->unwrap()->yield($context);
        // line 65
        yield "    ";
        if ((((($context["nav"] ?? null) == "dashboard") || (($context["nav"] ?? null) == "projects")) || (($context["nav"] ?? null) == "tags"))) {
            // line 66
            yield "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
    ";
        }
        // line 68
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  193 => 68,  189 => 66,  186 => 65,  183 => 64,  176 => 63,  166 => 61,  161 => 12,  158 => 11,  151 => 10,  140 => 7,  133 => 69,  131 => 63,  128 => 62,  125 => 61,  119 => 59,  117 => 58,  114 => 57,  94 => 40,  69 => 17,  67 => 16,  62 => 13,  60 => 10,  54 => 7,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\" data-theme=\"light\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Tasky{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css\" rel=\"stylesheet\">
    {% block headscripts %}
    {% include 'partials/headscripts.twig' %}
    {% endblock %}
</head>

<body>
    {% if auth.isLoggedIn %}
    <nav class=\"navbar navbar-expand-lg\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"index.php?nav=dashboard\">Tasky</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=dashboard\">Dashboard</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=projects\">Projects</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=tags\">Tags</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=reports\">Reports</a>
                    </li>
                </ul>
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <span class=\"nav-link\">Welcome, {{ full_name }}</span>
                    </li>
                    <li class=\"nav-item\">
                        <button id=\"themeToggle\" class=\"btn btn-outline-secondary me-2\">
                            <i id=\"themeIcon\" class=\"bi bi-sun\"></i>
                        </button>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=logout\">
                            <i class=\"bi bi-box-arrow-right me-1\"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {% endif %}
    <div class=\"container mt-5\">
        {% if error %}
        <div class=\"alert alert-danger\">{{ error }}</div>
        {% endif %}
        {% block content %}{% endblock %}
    </div>
    {% block footscripts %}
    {% include 'partials/footscripts.twig' %}
    {% if nav == 'dashboard' or nav == 'projects' or nav == 'tags' %}
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
    {% endif %}
    {% endblock %}
</body>

</html>", "base.twig", "C:\\xampp\\htdocs\\tasky\\templates\\base.twig");
    }
}
