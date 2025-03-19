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

/* pages/edit_entry.twig */
class __TwigTemplate_6605f2e27565109426f772123fec4831 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/edit_entry.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Edit Entry - Tasky";
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
        yield "<div class=\"card\">
    <div class=\"card-header\">
        Edit Entry
        <a href=\"index.php?nav=dashboard\" class=\"btn btn-primary float-end\">Back to Dashboard</a>
    </div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=edit_entry&id=";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 13), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"update_entry\">
            <div class=\"mb-3\">
                <label for=\"project_id\" class=\"form-label\">Project</label>
                <select class=\"form-select\" id=\"project_id\" name=\"project_id\" required>
                    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 19
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 19), "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 19) == CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "project_id", [], "any", false, false, false, 19))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 19), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "                </select>
            </div>
            <div class=\"mb-3\">
                <label for=\"tag_id\" class=\"form-label\">Tag</label>
                <select class=\"form-select\" id=\"tag_id\" name=\"tag_id\">
                    <option value=\"\">Select Tag</option>
                    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 28
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 28), "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 28) == CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "tag_id", [], "any", false, false, false, 28))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 28), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "                </select>
            </div>
            <div class=\"mb-3\">
                <label for=\"date\" class=\"form-label\">Date</label>
                <input type=\"date\" class=\"form-control\" id=\"date\" name=\"date\" value=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "date", [], "any", false, false, false, 34), "html", null, true);
        yield "\" required>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-md-6\">
                    <label for=\"start_time\" class=\"form-label\">Start Time</label>
                    <input type=\"time\" class=\"form-control\" id=\"start_time\" name=\"start_time\" value=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "start_time", [], "any", false, false, false, 39), "html", null, true);
        yield "\" step=\"1\" required>
                </div>
                <div class=\"col-md-6\">
                    <label for=\"end_time\" class=\"form-label\">End Time</label>
                    <input type=\"time\" class=\"form-control\" id=\"end_time\" name=\"end_time\" value=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "end_time", [], "any", false, false, false, 43), "html", null, true);
        yield "\" step=\"1\" required>
                </div>
            </div>
            <div class=\"mb-3\">
                <label for=\"description\" class=\"form-label\">Description</label>
                <input type=\"text\" class=\"form-control\" id=\"description\" name=\"description\" value=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "description", [], "any", false, false, false, 48), "")) : ("")), "html", null, true);
        yield "\">
            </div>
            <div class=\"mb-3 form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"is_billable\" name=\"is_billable\" ";
        // line 51
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["entry"] ?? null), "is_billable", [], "any", false, false, false, 51)) {
            yield "checked";
        }
        yield ">
                <label class=\"form-check-label\" for=\"is_billable\">Billable</label>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Update Entry</button>
        </form>
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
        return "pages/edit_entry.twig";
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
        return array (  171 => 51,  165 => 48,  157 => 43,  150 => 39,  142 => 34,  136 => 30,  121 => 28,  117 => 27,  109 => 21,  94 => 19,  90 => 18,  82 => 13,  78 => 12,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/edit_entry.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\edit_entry.twig");
    }
}
