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

/* pages/reports.twig */
class __TwigTemplate_a4b5bc655707b629889cb1fe933f54d9 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/reports.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Reports - Tasky";
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
        yield "<div class=\"card mb-4\">
    <div class=\"card-header\">Filter Hours by Project</div>
    <div class=\"card-body\">
        <form method=\"GET\" action=\"index.php\">
            <input type=\"hidden\" name=\"nav\" value=\"reports\">
            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    <label for=\"start_date\" class=\"form-label\">Start Date</label>
                    <input type=\"date\" class=\"form-control\" id=\"start_date\" name=\"start_date\" value=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["start_date"] ?? null), "html", null, true);
        yield "\" required>
                </div>
                <div class=\"col-md-4 mb-3\">
                    <label for=\"end_date\" class=\"form-label\">End Date</label>
                    <input type=\"date\" class=\"form-control\" id=\"end_date\" name=\"end_date\" value=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["end_date"] ?? null), "html", null, true);
        yield "\" required>
                </div>
                <div class=\"col-md-4 mb-3 d-flex align-items-end\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">Generate Report</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        Hours by Project
        <form method=\"POST\" action=\"index.php?nav=reports\" class=\"d-inline float-end\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"start_date\" value=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["start_date"] ?? null), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"end_date\" value=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["end_date"] ?? null), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"export_csv\" value=\"1\">
            <button type=\"submit\" class=\"btn btn-secondary btn-sm\">Export to CSV</button>
        </form>
    </div>
    <div class=\"card-body\">
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["reports"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 49
            yield "                <tr>
                    <td>";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["report"], "project_name", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "project_name", [], "any", false, false, false, 50), "No Project")) : ("No Project")), "html", null, true);
            yield "</td>
                    <td>";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "total_hours", [], "any", false, false, false, 51), 2), "html", null, true);
            yield "</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['report'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "            </tbody>
        </table>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/reports.twig";
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
        return array (  149 => 54,  140 => 51,  136 => 50,  133 => 49,  129 => 48,  112 => 34,  108 => 33,  104 => 32,  87 => 18,  80 => 14,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Reports - Tasky{% endblock %}

{% block content %}
<div class=\"card mb-4\">
    <div class=\"card-header\">Filter Hours by Project</div>
    <div class=\"card-body\">
        <form method=\"GET\" action=\"index.php\">
            <input type=\"hidden\" name=\"nav\" value=\"reports\">
            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    <label for=\"start_date\" class=\"form-label\">Start Date</label>
                    <input type=\"date\" class=\"form-control\" id=\"start_date\" name=\"start_date\" value=\"{{ start_date }}\" required>
                </div>
                <div class=\"col-md-4 mb-3\">
                    <label for=\"end_date\" class=\"form-label\">End Date</label>
                    <input type=\"date\" class=\"form-control\" id=\"end_date\" name=\"end_date\" value=\"{{ end_date }}\" required>
                </div>
                <div class=\"col-md-4 mb-3 d-flex align-items-end\">
                    <button type=\"submit\" class=\"btn btn-primary w-100\">Generate Report</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        Hours by Project
        <form method=\"POST\" action=\"index.php?nav=reports\" class=\"d-inline float-end\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
            <input type=\"hidden\" name=\"start_date\" value=\"{{ start_date }}\">
            <input type=\"hidden\" name=\"end_date\" value=\"{{ end_date }}\">
            <input type=\"hidden\" name=\"export_csv\" value=\"1\">
            <button type=\"submit\" class=\"btn btn-secondary btn-sm\">Export to CSV</button>
        </form>
    </div>
    <div class=\"card-body\">
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                {% for report in reports %}
                <tr>
                    <td>{{ report.project_name|default('No Project') }}</td>
                    <td>{{ report.total_hours|number_format(2) }}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}", "pages/reports.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\reports.twig");
    }
}
