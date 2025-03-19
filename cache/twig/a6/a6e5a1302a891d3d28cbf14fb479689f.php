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
class __TwigTemplate_4909173c2bed4d445a8285b0a7a5caa0 extends Template
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
                        <button type=\"button\" class=\"btn btn-sm btn-warning edit-tag-btn\" data-bs-toggle=\"modal\" data-bs-target=\"#editTagModal\" data-id=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 30), "html", null, true);
            yield "\" data-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 30), "html", null, true);
            yield "\">Edit</button>
                        <form method=\"POST\" action=\"index.php?nav=tags\" style=\"display:inline;\" onsubmit=\"return confirm('Are you sure you want to delete this tag?');\">
                            <input type=\"hidden\" name=\"csrf_token\" value=\"";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 32), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"action\" value=\"delete_tag\">
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
        <nav aria-label=\"Page navigation\">
            <ul class=\"pagination\">
                ";
        // line 44
        if ((($context["current_page"] ?? null) > 1)) {
            // line 45
            yield "                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"index.php?nav=tags&page=";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["current_page"] ?? null) - 1), "html", null, true);
            yield "\">Previous</a>
                </li>
                ";
        }
        // line 49
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 50
            yield "                <li class=\"page-item ";
            if (($context["i"] == ($context["current_page"] ?? null))) {
                yield "active";
            }
            yield "\">
                    <a class=\"page-link\" href=\"index.php?nav=tags&page=";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "</a>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        yield "                ";
        if ((($context["current_page"] ?? null) < ($context["total_pages"] ?? null))) {
            // line 55
            yield "                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"index.php?nav=tags&page=";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["current_page"] ?? null) + 1), "html", null, true);
            yield "\">Next</a>
                </li>
                ";
        }
        // line 59
        yield "            </ul>
        </nav>
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
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 75), "html", null, true);
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

<!-- Single Edit Tag Modal -->
<div class=\"modal fade\" id=\"editTagModal\" tabindex=\"-1\" aria-labelledby=\"editTagModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"editTagModalLabel\">Edit Tag</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"POST\" action=\"index.php?nav=tags\" id=\"editTagForm\">
                    <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 97), "html", null, true);
        yield "\">
                    <input type=\"hidden\" name=\"action\" value=\"update_tag\">
                    <input type=\"hidden\" name=\"id\" id=\"edit_tag_id\">
                    <div class=\"mb-3\">
                        <label for=\"edit_name\" class=\"form-label\">Tag Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"edit_name\" name=\"name\" required>
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

    // line 112
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 113
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

    // Edit tag modal population
    document.querySelectorAll('.edit-tag-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('edit_tag_id').value = id;
            document.getElementById('edit_name').value = name;
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
        return array (  263 => 113,  256 => 112,  237 => 97,  212 => 75,  194 => 59,  188 => 56,  185 => 55,  182 => 54,  171 => 51,  164 => 50,  159 => 49,  153 => 46,  150 => 45,  148 => 44,  142 => 40,  130 => 34,  125 => 32,  118 => 30,  113 => 28,  110 => 27,  106 => 26,  96 => 18,  90 => 16,  87 => 15,  81 => 13,  79 => 12,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/tags.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\tags.twig");
    }
}
