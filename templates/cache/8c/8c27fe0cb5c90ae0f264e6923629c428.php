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

/* pages/login.twig */
class __TwigTemplate_5a8b56579ca3487fd4b5d3daaa277f3f extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "pages/login.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Login - Tasky";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<h1>Login</h1>
";
        // line 7
        if (($context["error"] ?? null)) {
            // line 8
            yield "<div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
";
        }
        // line 10
        yield "<form method=\"POST\" action=\"index.php?nav=login\">
    <div class=\"mb-3\">
        <label for=\"username\" class=\"form-label\">Username</label>
        <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required>
    </div>
    <div class=\"mb-3\">
        <label for=\"password\" class=\"form-label\">Password</label>
        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Login</button>
</form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/login.twig";
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
        return array (  81 => 10,  75 => 8,  73 => 7,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Login - Tasky{% endblock %}

{% block content %}
<h1>Login</h1>
{% if error %}
<div class=\"alert alert-danger\">{{ error }}</div>
{% endif %}
<form method=\"POST\" action=\"index.php?nav=login\">
    <div class=\"mb-3\">
        <label for=\"username\" class=\"form-label\">Username</label>
        <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required>
    </div>
    <div class=\"mb-3\">
        <label for=\"password\" class=\"form-label\">Password</label>
        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Login</button>
</form>
{% endblock %}", "pages/login.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\login.twig");
    }
}
