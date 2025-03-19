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

/* pages/projects.twig */
class __TwigTemplate_6129da27ec3f2907c50acbee60ffb31d extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/projects.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Projects - Tasky";
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
    <div class=\"card-header\">Add Project</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=projects\">
            <input type=\"hidden\" name=\"action\" value=\"add_project\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
        yield "\">
            <div class=\"mb-3\">
                <label for=\"name\" class=\"form-label\">Project Name</label>
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"client\" class=\"form-label\">Client</label>
                <input type=\"text\" class=\"form-control\" id=\"client\" name=\"client\" list=\"clientOptions\">
                <datalist id=\"clientOptions\">
                    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["unique_clients"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
            // line 21
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["client"], "html", null, true);
            yield "\">
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['client'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        yield "                </datalist>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Add Project</button>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">Project List</div>
    <div class=\"card-body\">
        ";
        // line 33
        if (($context["error"] ?? null)) {
            // line 34
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 36
        yield "        ";
        if (($context["success"] ?? null)) {
            // line 37
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["success"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 39
        yield "        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 49
            yield "                <tr>
                    <td>";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 50), "html", null, true);
            yield "</td>
                    <td>";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 51), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>
                        <button type=\"button\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editProjectModal";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 53), "html", null, true);
            yield "\" onclick=\"console.log('Edit clicked for project ID: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 53), "html", null, true);
            yield "')\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=projects\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this project?');\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_project\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"id\" value=\"";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 57), "html", null, true);
            yield "\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\">Delete</button>
                        </form>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        yield "            </tbody>
        </table>
    </div>
</div>

";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 69
            yield "<div class=\"modal fade\" id=\"editProjectModal";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 69), "html", null, true);
            yield "\" tabindex=\"-1\" aria-labelledby=\"editProjectModalLabel";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 69), "html", null, true);
            yield "\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editProjectModalLabel";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 73), "html", null, true);
            yield "\">Edit Project</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=projects\">
                    <input type=\"hidden\" name=\"action\" value=\"update_project\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
            yield "\">
                    <input type=\"hidden\" name=\"id\" value=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 80), "html", null, true);
            yield "\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name_";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 82), "html", null, true);
            yield "\" class=\"form-label\">Project Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name_";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 83), "html", null, true);
            yield "\" name=\"name\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 83), "html", null, true);
            yield "\" required>
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"edit_client_";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 86), "html", null, true);
            yield "\" class=\"form-label\">Client</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_client_";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 87), "html", null, true);
            yield "\" name=\"client\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 87), "")) : ("")), "html", null, true);
            yield "\" list=\"clientOptions\">
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
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/projects.twig";
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
        return array (  237 => 87,  233 => 86,  225 => 83,  221 => 82,  216 => 80,  212 => 79,  203 => 73,  193 => 69,  189 => 68,  182 => 63,  170 => 57,  166 => 56,  158 => 53,  153 => 51,  149 => 50,  146 => 49,  142 => 48,  131 => 39,  125 => 37,  122 => 36,  116 => 34,  114 => 33,  102 => 23,  93 => 21,  89 => 20,  77 => 11,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Projects - Tasky{% endblock %}

{% block content %}
<div class=\"card mb-4\">
    <div class=\"card-header\">Add Project</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=projects\">
            <input type=\"hidden\" name=\"action\" value=\"add_project\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
            <div class=\"mb-3\">
                <label for=\"name\" class=\"form-label\">Project Name</label>
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"client\" class=\"form-label\">Client</label>
                <input type=\"text\" class=\"form-control\" id=\"client\" name=\"client\" list=\"clientOptions\">
                <datalist id=\"clientOptions\">
                    {% for client in unique_clients %}
                    <option value=\"{{ client }}\">
                        {% endfor %}
                </datalist>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Add Project</button>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">Project List</div>
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
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for project in projects %}
                <tr>
                    <td>{{ project.name }}</td>
                    <td>{{ project.client|default('') }}</td>
                    <td>
                        <button type=\"button\" class=\"btn btn-sm btn-warning\" data-bs-toggle=\"modal\" data-bs-target=\"#editProjectModal{{ project.id }}\" onclick=\"console.log('Edit clicked for project ID: {{ project.id }}')\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=projects\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this project?');\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_project\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
                            <input type=\"hidden\" name=\"id\" value=\"{{ project.id }}\">
                            <button type=\"submit\" class=\"btn btn-sm btn-danger\">Delete</button>
                        </form>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

{% for project in projects %}
<div class=\"modal fade\" id=\"editProjectModal{{ project.id }}\" tabindex=\"-1\" aria-labelledby=\"editProjectModalLabel{{ project.id }}\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editProjectModalLabel{{ project.id }}\">Edit Project</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=projects\">
                    <input type=\"hidden\" name=\"action\" value=\"update_project\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
                    <input type=\"hidden\" name=\"id\" value=\"{{ project.id }}\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name_{{ project.id }}\" class=\"form-label\">Project Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name_{{ project.id }}\" name=\"name\" value=\"{{ project.name }}\" required>
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"edit_client_{{ project.id }}\" class=\"form-label\">Client</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_client_{{ project.id }}\" name=\"client\" value=\"{{ project.client|default('') }}\" list=\"clientOptions\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endfor %}
{% endblock %}", "pages/projects.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\projects.twig");
    }
}
