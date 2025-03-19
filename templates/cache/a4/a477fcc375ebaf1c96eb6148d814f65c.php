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

/* pages/tags.twig */
class __TwigTemplate_c63e1c5001307cd54b7737f88bbd4d59 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/tags.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Tags - Tasky";
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
    <div class=\"card-header\">
        Tag Management
        <button type=\"button\" class=\"btn btn-primary float-end\" data-bs-toggle=\"modal\" data-bs-target=\"#addTagModal\">Add Tag</button>
    </div>
    <div class=\"card-body\">
        ";
        // line 12
        if (($context["error"] ?? null)) {
            // line 13
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 15
        yield "        ";
        if (($context["success"] ?? null)) {
            // line 16
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["success"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 18
        yield "        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 27
            yield "                <tr>
                    <td>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 28), "html", null, true);
            yield "</td>
                    <td>
                        <button type=\"button\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editTagModal";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 30), "html", null, true);
            yield "\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=tags\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this tag?');\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_tag\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"id\" value=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\">Delete</button>
                        </form>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "            </tbody>
        </table>
    </div>
</div>

<!-- Add Tag Modal -->
<div class=\"modal fade\" id=\"addTagModal\" tabindex=\"-1\" aria-labelledby=\"addTagModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"addTagModalLabel\">Add Tag</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=tags\">
                    <input type=\"hidden\" name=\"action\" value=\"add_tag\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
        yield "\">
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Tag Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Add Tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Tag Modals -->
";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 70
            yield "<div class=\"modal fade\" id=\"editTagModal";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 70), "html", null, true);
            yield "\" tabindex=\"-1\" aria-labelledby=\"editTagModalLabel";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 70), "html", null, true);
            yield "\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editTagModalLabel";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 74), "html", null, true);
            yield "\">Edit Tag</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=tags\">
                    <input type=\"hidden\" name=\"action\" value=\"update_tag\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
            yield "\">
                    <input type=\"hidden\" name=\"id\" value=\"";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 81), "html", null, true);
            yield "\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name_";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 83), "html", null, true);
            yield "\" class=\"form-label\">Tag Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name_";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 84), "html", null, true);
            yield "\" name=\"name\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 84), "html", null, true);
            yield "\" required>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/tags.twig";
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
        return array (  209 => 84,  205 => 83,  200 => 81,  196 => 80,  187 => 74,  177 => 70,  173 => 69,  157 => 56,  139 => 40,  127 => 34,  123 => 33,  117 => 30,  112 => 28,  109 => 27,  105 => 26,  95 => 18,  89 => 16,  86 => 15,  80 => 13,  78 => 12,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Tags - Tasky{% endblock %}

{% block content %}
<div class=\"card mb-4\">
    <div class=\"card-header\">
        Tag Management
        <button type=\"button\" class=\"btn btn-primary float-end\" data-bs-toggle=\"modal\" data-bs-target=\"#addTagModal\">Add Tag</button>
    </div>
    <div class=\"card-body\">
        {% if error %}
        <div class=\"alert alert-danger\">{{ error }}</div>
        {% endif %}
        {% if success %}
        <div class=\"alert alert-success\">{{ success }}</div>
        {% endif %}
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for tag in tags %}
                <tr>
                    <td>{{ tag.name }}</td>
                    <td>
                        <button type=\"button\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editTagModal{{ tag.id }}\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=tags\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this tag?');\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_tag\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
                            <input type=\"hidden\" name=\"id\" value=\"{{ tag.id }}\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\">Delete</button>
                        </form>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

<!-- Add Tag Modal -->
<div class=\"modal fade\" id=\"addTagModal\" tabindex=\"-1\" aria-labelledby=\"addTagModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"addTagModalLabel\">Add Tag</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=tags\">
                    <input type=\"hidden\" name=\"action\" value=\"add_tag\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
                    <div class=\"mb-3\">
                        <label for=\"name\" class=\"form-label\">Tag Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Add Tag</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Tag Modals -->
{% for tag in tags %}
<div class=\"modal fade\" id=\"editTagModal{{ tag.id }}\" tabindex=\"-1\" aria-labelledby=\"editTagModalLabel{{ tag.id }}\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editTagModalLabel{{ tag.id }}\">Edit Tag</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=tags\">
                    <input type=\"hidden\" name=\"action\" value=\"update_tag\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
                    <input type=\"hidden\" name=\"id\" value=\"{{ tag.id }}\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name_{{ tag.id }}\" class=\"form-label\">Tag Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name_{{ tag.id }}\" name=\"name\" value=\"{{ tag.name }}\" required>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endfor %}
{% endblock %}", "pages/tags.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\tags.twig");
    }
}
