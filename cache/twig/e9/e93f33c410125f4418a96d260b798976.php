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

/* pages/dashboard.twig */
class __TwigTemplate_08bd111382b20a7bc76dac459cec50fa extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/dashboard.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Dashboard - Tasky";
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
    <div class=\"card-header\">Weekly Summary</div>
    <div class=\"card-body\">
        <p>Total Hours This Week: ";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("total_hours", $context)) ? (Twig\Extension\CoreExtension::default(($context["total_hours"] ?? null), "0.00")) : ("0.00")), "html", null, true);
        yield "</p>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\">Quick Timer</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=dashboard\" id=\"timerForm\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 17), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"add_entry\">
            <div class=\"row mb-3\">
                <div class=\"col-md-3\">
                    <select class=\"form-select\" name=\"project_id\" required>
                        <option value=\"\">Select Project</option>
                        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 24
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 24), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 24), "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "                    </select>
                </div>
                <div class=\"col-md-3\">
                    <select class=\"form-select\" name=\"tag_id\">
                        <option value=\"\">Select Tag</option>
                        ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 32
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 32), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 32), "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        yield "                    </select>
                </div>
                <div class=\"col-md-2\">
                    <input type=\"text\" class=\"form-control\" id=\"timerDisplay\" value=\"00:00:00\" readonly>
                    <input type=\"hidden\" name=\"start_time\" id=\"start_time\">
                    <input type=\"hidden\" name=\"end_time\" id=\"end_time\">
                    <input type=\"hidden\" name=\"date\" id=\"date\" value=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "\">
                </div>
                <div class=\"col-md-4\">
                    <button type=\"button\" class=\"btn btn-success\" id=\"startTimer\">Start</button>
                    <button type=\"button\" class=\"btn btn-danger\" id=\"stopTimer\" disabled>Stop</button>
                    <button type=\"submit\" class=\"btn btn-primary\" id=\"saveTimer\" disabled>Save</button>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-md-12\">
                    <input type=\"text\" class=\"form-control\" name=\"description\" placeholder=\"Description\">
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"form-check\">
                        <input type=\"checkbox\" class=\"form-check-input\" name=\"is_billable\" id=\"is_billable\">
                        <label class=\"form-check-label\" for=\"is_billable\">Billable</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">Recent Entries</div>
    <div class=\"card-body\">
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Project</th>
                    <th>Tag</th>
                    <th>Time</th>
                    <th>Hours</th>
                    <th>Description</th>
                    <th>Billable</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["entries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 83
            yield "                <tr>
                    <td>";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "date", [], "any", false, false, false, 84), "html", null, true);
            yield "</td>
                    <td>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "project_name", [], "any", true, true, false, 85)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "project_name", [], "any", false, false, false, 85), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "tag_name", [], "any", true, true, false, 86)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "tag_name", [], "any", false, false, false, 86), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "start_time", [], "any", false, false, false, 87), 0, 5), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "end_time", [], "any", false, false, false, 87), 0, 5), "html", null, true);
            yield "</td>
                    <td>";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "hours_worked", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "hours_worked", [], "any", false, false, false, 88), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "description", [], "any", true, true, false, 89)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "description", [], "any", false, false, false, 89), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>";
            // line 90
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "is_billable", [], "any", false, false, false, 90)) ? ("Yes") : ("No"));
            yield "</td>
                    <td>
                        <a href=\"index.php?nav=edit_entry&id=";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "id", [], "any", false, false, false, 92), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Edit</a>
                        <a href=\"index.php?nav=delete_entry&id=";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "id", [], "any", false, false, false, 93), "html", null, true);
            yield "\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['entry'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        yield "            </tbody>
        </table>
        <nav aria-label=\"Page navigation\">
            <ul class=\"pagination\">
                ";
        // line 101
        if ((($context["current_page"] ?? null) > 1)) {
            // line 102
            yield "                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"index.php?nav=dashboard&page=";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["current_page"] ?? null) - 1), "html", null, true);
            yield "\">Previous</a>
                </li>
                ";
        }
        // line 106
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 107
            yield "                <li class=\"page-item ";
            if (($context["i"] == ($context["current_page"] ?? null))) {
                yield "active";
            }
            yield "\">
                    <a class=\"page-link\" href=\"index.php?nav=dashboard&page=";
            // line 108
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
        // line 111
        yield "                ";
        if ((($context["current_page"] ?? null) < ($context["total_pages"] ?? null))) {
            // line 112
            yield "                <li class=\"page-item\">
                    <a class=\"page-link\" href=\"index.php?nav=dashboard&page=";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["current_page"] ?? null) + 1), "html", null, true);
            yield "\">Next</a>
                </li>
                ";
        }
        // line 116
        yield "            </ul>
        </nav>
    </div>
</div>
";
        yield from [];
    }

    // line 122
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 123
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

    // Timer logic
    let timerInterval;
    let seconds = 0;
    const timerDisplay = document.getElementById('timerDisplay');
    const startTimerBtn = document.getElementById('startTimer');
    const stopTimerBtn = document.getElementById('stopTimer');
    const saveTimerBtn = document.getElementById('saveTimer');
    const startTimeInput = document.getElementById('start_time');
    const endTimeInput = document.getElementById('end_time');

    function updateTimerDisplay() {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const secs = seconds % 60;
        timerDisplay.value = `\${String(hours).padStart(2, '0')}:\${String(minutes).padStart(2, '0')}:\${String(secs).padStart(2, '0')}`;
    }

    startTimerBtn.addEventListener('click', () => {
        startTimerBtn.disabled = true;
        stopTimerBtn.disabled = false;
        saveTimerBtn.disabled = true;
        startTimeInput.value = new Date().toTimeString().slice(0, 8);
        timerInterval = setInterval(() => {
            seconds++;
            updateTimerDisplay();
        }, 1000);
    });

    stopTimerBtn.addEventListener('click', () => {
        clearInterval(timerInterval);
        startTimerBtn.disabled = false;
        stopTimerBtn.disabled = true;
        saveTimerBtn.disabled = false;
        endTimeInput.value = new Date().toTimeString().slice(0, 8);
    });

    saveTimerBtn.addEventListener('click', () => {
        document.getElementById('timerForm').submit();
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
        return "pages/dashboard.twig";
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
        return array (  306 => 123,  299 => 122,  290 => 116,  284 => 113,  281 => 112,  278 => 111,  267 => 108,  260 => 107,  255 => 106,  249 => 103,  246 => 102,  244 => 101,  238 => 97,  228 => 93,  224 => 92,  219 => 90,  215 => 89,  211 => 88,  205 => 87,  201 => 86,  197 => 85,  193 => 84,  190 => 83,  186 => 82,  141 => 40,  133 => 34,  122 => 32,  118 => 31,  111 => 26,  100 => 24,  96 => 23,  87 => 17,  76 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/dashboard.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\dashboard.twig");
    }
}
