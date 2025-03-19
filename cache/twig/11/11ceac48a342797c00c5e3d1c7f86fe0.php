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

/* pages/edit_user.twig */
class __TwigTemplate_dda360a27abe8ccc9f5ea25bc50e4b3f extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/edit_user.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Edit User - Tasky";
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
    <div class=\"card-header\">Edit User</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=edit_user&id=";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 10), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"update_user\">
            <div class=\"mb-3\">
                <label for=\"username\" class=\"form-label\">Username</label>
                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" value=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "username", [], "any", false, false, false, 14), "html", null, true);
        yield "\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"password\" class=\"form-label\">New Password (leave blank to keep current)</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">
            </div>
            <div class=\"mb-3\">
                <label for=\"full_name\" class=\"form-label\">Full Name</label>
                <input type=\"text\" class=\"form-control\" id=\"full_name\" name=\"full_name\" value=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "full_name", [], "any", false, false, false, 22), "html", null, true);
        yield "\" required>
            </div>
            <div class=\"mb-3 form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"is_admin\" name=\"is_admin\" ";
        // line 25
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "is_admin", [], "any", false, false, false, 25)) {
            yield "checked";
        }
        yield ">
                <label class=\"form-check-label\" for=\"is_admin\">Is Admin</label>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Update User</button>
            <a href=\"index.php?nav=users\" class=\"btn btn-secondary\">Cancel</a>
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
        return "pages/edit_user.twig";
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
        return array (  103 => 25,  97 => 22,  86 => 14,  79 => 10,  75 => 9,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/edit_user.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\edit_user.twig");
    }
}
