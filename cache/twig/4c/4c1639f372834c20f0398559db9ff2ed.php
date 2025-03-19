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
class __TwigTemplate_a2962f74f4f6ec6b21ef1c78c3dfc407 extends Template
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
            'footscripts' => [$this, 'block_footscripts'],
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
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 10), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"add_project\">
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
                        <button type=\"button\" class=\"btn btn-sm btn-warning edit-project-btn\" data-bs-toggle=\"modal\" data-bs-target=\"#editProjectModal\" data-id=\"";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 53), "html", null, true);
            yield "\" data-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 53), "html", null, true);
            yield "\" data-client=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 53), "")) : ("")), "html", null, true);
            yield "\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=projects\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this project?');\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 55), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_project\">
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

<!-- Single Edit Project Modal -->
<div class=\"modal fade\" id=\"editProjectModal\" tabindex=\"-1\" aria-labelledby=\"editProjectModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editProjectModalLabel\">Edit Project</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=projects\" id=\"editProjectForm\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 78), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"action\" value=\"update_project\">
                    <input type=\"hidden\" name=\"id\" id=\"edit_project_id\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name\" class=\"form-label\">Project Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name\" name=\"name\" required>
                    </div>
                    <div class=\"mb-3\">
                        <label for=\"edit_client\" class=\"form-label\">Client</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_client\" name=\"client\" list=\"clientOptions\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 97
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 98
        yield "<script>
    // Theme toggle logic
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const html = document.documentElement;
    let theme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    // Set initial theme and icon
    html.setAttribute('data-theme', theme);
    themeIcon.className = theme === 'light' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';

    // Toggle theme
    themeToggle.addEventListener('click', () => {
        theme = theme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        themeIcon.className = theme === 'light' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
    });

    // Edit project modal population
    document.querySelectorAll('.edit-project-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const client = button.getAttribute('data-client');

            document.getElementById('edit_project_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_client').value = client;
        });
    });
</script>
";
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
        return array (  232 => 98,  225 => 97,  202 => 78,  185 => 63,  173 => 57,  168 => 55,  159 => 53,  154 => 51,  150 => 50,  147 => 49,  143 => 48,  132 => 39,  126 => 37,  123 => 36,  117 => 34,  115 => 33,  103 => 23,  94 => 21,  90 => 20,  77 => 10,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/projects.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\projects.twig");
    }
}
