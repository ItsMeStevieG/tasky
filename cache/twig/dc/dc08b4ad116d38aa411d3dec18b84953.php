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

/* pages/users.twig */
class __TwigTemplate_fc74e86ac72441c2b4ef63113f13af10 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/users.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Users - Tasky";
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
    <div class=\"card-header\">Add User</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=users\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 10), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"add_user\">
            <div class=\"mb-3\">
                <label for=\"username\" class=\"form-label\">Username</label>
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"password\" class=\"form-label\">Password</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"full_name\" class=\"form-label\">Full Name</label>
                <input type=\"text\" class=\"form-control\" id=\"full_name\" name=\"full_name\" required>
            </div>
            <div class=\"mb-3 form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"is_admin\" name=\"is_admin\">
                <label class=\"form-check-label\" for=\"is_admin\">Is Admin</label>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Add User</button>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">User List</div>
    <div class=\"card-body\">
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 47
            yield "                <tr>
                    <td>";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 48), "html", null, true);
            yield "</td>
                    <td>";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "full_name", [], "any", false, false, false, 49), "html", null, true);
            yield "</td>
                    <td>";
            // line 50
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "is_admin", [], "any", false, false, false, 50)) ? ("Yes") : ("No"));
            yield "</td>
                    <td>
                        <a href=\"index.php?nav=edit_user&id=";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 52), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Edit</a>
                        <a href=\"index.php?nav=delete_user&id=";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 53), "html", null, true);
            yield "\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
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
        return "pages/users.twig";
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
        return array (  149 => 57,  139 => 53,  135 => 52,  130 => 50,  126 => 49,  122 => 48,  119 => 47,  115 => 46,  76 => 10,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/users.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\users.twig");
    }
}
