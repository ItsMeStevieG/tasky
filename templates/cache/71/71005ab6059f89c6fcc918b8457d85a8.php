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
class __TwigTemplate_1e8afd0c6173cf5691367a46cf37552d extends Template
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(($context["weekly_hours"] ?? null), 2), "html", null, true);
        yield "</p>
    </div>
</div>
<div class=\"card mb-4\">
    <div class=\"card-header\">Quick Timer</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=dashboard\" id=\"timerForm\">
            <input type=\"hidden\" name=\"action\" value=\"add_entry\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csrf_token"] ?? null), "html", null, true);
        yield "\">
            <div class=\"row\">
                <div class=\"col-md-3 mb-3\">
                    <select name=\"project_id\" class=\"form-select\" required>
                        <option value=\"\">Select Project</option>
                        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 23
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 23), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 23), "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "                    </select>
                </div>
                <div class=\"col-md-3 mb-3\">
                    <select name=\"tag_id\" class=\"form-select\">
                        <option value=\"\">Select Tag</option>
                        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 31
            yield "                        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "id", [], "any", false, false, false, 31), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, false, 31), "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "                    </select>
                </div>
                <div class=\"col-md-2 mb-3\">
                    <input type=\"text\" id=\"timerDisplay\" class=\"form-control\" value=\"00:00:00\" readonly>
                </div>
                <div class=\"col-md-4 mb-3\">
                    <button type=\"button\" id=\"startTimer\" class=\"btn btn-success\" data-bs-toggle=\"tooltip\" title=\"Start tracking time\">Start</button>
                    <button type=\"button\" id=\"stopTimer\" class=\"btn btn-danger\" disabled data-bs-toggle=\"tooltip\" title=\"Stop tracking time\">Stop</button>
                    <button type=\"submit\" id=\"saveTimer\" class=\"btn btn-primary\" disabled data-bs-toggle=\"tooltip\" title=\"Save the time entry\">Save</button>
                </div>
            </div>
            <div class=\"mb-3\">
                <label for=\"description\" class=\"form-label\">Description</label>
                <textarea class=\"form-control\" id=\"description\" name=\"description\"></textarea>
            </div>
            <div class=\"mb-3 form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"is_billable\" name=\"is_billable\">
                <label class=\"form-check-label\" for=\"is_billable\">Billable</label>
            </div>
            <input type=\"hidden\" name=\"start_time\" id=\"startTime\">
            <input type=\"hidden\" name=\"end_time\" id=\"endTime\">
            <input type=\"hidden\" name=\"date\" value=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "\">
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
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["entries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 77
            yield "                <tr>
                    <td>";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "date", [], "any", false, false, false, 78), "html", null, true);
            yield "</td>
                    <td>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "project_name", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "project_name", [], "any", false, false, false, 79), "None")) : ("None")), "html", null, true);
            yield "</td>
                    <td>";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "tag_name", [], "any", true, true, false, 80)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "tag_name", [], "any", false, false, false, 80), "None")) : ("None")), "html", null, true);
            yield "</td>
                    <td>";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "start_time", [], "any", false, false, false, 81), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "end_time", [], "any", false, false, false, 81), "html", null, true);
            yield "</td>
                    <td>";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "hours_worked", [], "any", false, false, false, 82), "html", null, true);
            yield "</td>
                    <td>";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "description", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "description", [], "any", false, false, false, 83), "")) : ("")), "html", null, true);
            yield "</td>
                    <td>";
            // line 84
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "is_billable", [], "any", false, false, false, 84)) ? ("Yes") : ("No"));
            yield "</td>
                    <td>
                        <a href=\"index.php?nav=edit_entry&id=";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "id", [], "any", false, false, false, 86), "html", null, true);
            yield "\" class=\"btn btn-sm btn-warning\">Edit</a>
                        <a href=\"index.php?nav=delete_entry&id=";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["entry"], "id", [], "any", false, false, false, 87), "html", null, true);
            yield "\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['entry'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        yield "            </tbody>
        </table>
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
        yield from $this->yieldParentBlock("footscripts", $context, $blocks);
        yield "
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
<script>
    let timer;
    let seconds = 0;
    const timerDisplay = document.getElementById('timerDisplay');
    const startBtn = document.getElementById('startTimer');
    const stopBtn = document.getElementById('stopTimer');
    const saveBtn = document.getElementById('saveTimer');

    function updateTimer() {
        seconds++;
        let hrs = Math.floor(seconds / 3600);
        let mins = Math.floor((seconds % 3600) / 60);
        let secs = seconds % 60;
        timerDisplay.value = `\${hrs.toString().padStart(2, '0')}:\${mins.toString().padStart(2, '0')}:\${secs.toString().padStart(2, '0')}`;
    }

    startBtn.addEventListener('click', () => {
        const now = new Date();
        document.getElementById('startTime').value = now.toTimeString().slice(0, 8);
        timer = setInterval(updateTimer, 1000);
        startBtn.disabled = true;
        stopBtn.disabled = false;
        saveBtn.disabled = false;
    });

    stopBtn.addEventListener('click', () => {
        clearInterval(timer);
        const now = new Date();
        document.getElementById('endTime').value = now.toTimeString().slice(0, 8);
        startBtn.disabled = false;
        stopBtn.disabled = true;
    });

    // Enable Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
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
        return array (  248 => 98,  241 => 97,  232 => 91,  222 => 87,  218 => 86,  213 => 84,  209 => 83,  205 => 82,  199 => 81,  195 => 80,  191 => 79,  187 => 78,  184 => 77,  180 => 76,  155 => 54,  132 => 33,  121 => 31,  117 => 30,  110 => 25,  99 => 23,  95 => 22,  87 => 17,  76 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.twig' %}

{% block title %}Dashboard - Tasky{% endblock %}

{% block content %}
<div class=\"card mb-4\">
    <div class=\"card-header\">Weekly Summary</div>
    <div class=\"card-body\">
        <p>Total Hours This Week: {{ weekly_hours|number_format(2) }}</p>
    </div>
</div>
<div class=\"card mb-4\">
    <div class=\"card-header\">Quick Timer</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=dashboard\" id=\"timerForm\">
            <input type=\"hidden\" name=\"action\" value=\"add_entry\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"{{ csrf_token }}\">
            <div class=\"row\">
                <div class=\"col-md-3 mb-3\">
                    <select name=\"project_id\" class=\"form-select\" required>
                        <option value=\"\">Select Project</option>
                        {% for project in projects %}
                        <option value=\"{{ project.id }}\">{{ project.name }}</option>
                        {% endfor %}
                    </select>
                </div>
                <div class=\"col-md-3 mb-3\">
                    <select name=\"tag_id\" class=\"form-select\">
                        <option value=\"\">Select Tag</option>
                        {% for tag in tags %}
                        <option value=\"{{ tag.id }}\">{{ tag.name }}</option>
                        {% endfor %}
                    </select>
                </div>
                <div class=\"col-md-2 mb-3\">
                    <input type=\"text\" id=\"timerDisplay\" class=\"form-control\" value=\"00:00:00\" readonly>
                </div>
                <div class=\"col-md-4 mb-3\">
                    <button type=\"button\" id=\"startTimer\" class=\"btn btn-success\" data-bs-toggle=\"tooltip\" title=\"Start tracking time\">Start</button>
                    <button type=\"button\" id=\"stopTimer\" class=\"btn btn-danger\" disabled data-bs-toggle=\"tooltip\" title=\"Stop tracking time\">Stop</button>
                    <button type=\"submit\" id=\"saveTimer\" class=\"btn btn-primary\" disabled data-bs-toggle=\"tooltip\" title=\"Save the time entry\">Save</button>
                </div>
            </div>
            <div class=\"mb-3\">
                <label for=\"description\" class=\"form-label\">Description</label>
                <textarea class=\"form-control\" id=\"description\" name=\"description\"></textarea>
            </div>
            <div class=\"mb-3 form-check\">
                <input type=\"checkbox\" class=\"form-check-input\" id=\"is_billable\" name=\"is_billable\">
                <label class=\"form-check-label\" for=\"is_billable\">Billable</label>
            </div>
            <input type=\"hidden\" name=\"start_time\" id=\"startTime\">
            <input type=\"hidden\" name=\"end_time\" id=\"endTime\">
            <input type=\"hidden\" name=\"date\" value=\"{{ 'now'|date('Y-m-d') }}\">
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
                {% for entry in entries %}
                <tr>
                    <td>{{ entry.date }}</td>
                    <td>{{ entry.project_name|default('None') }}</td>
                    <td>{{ entry.tag_name|default('None') }}</td>
                    <td>{{ entry.start_time }} - {{ entry.end_time }}</td>
                    <td>{{ entry.hours_worked }}</td>
                    <td>{{ entry.description|default('') }}</td>
                    <td>{{ entry.is_billable ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href=\"index.php?nav=edit_entry&id={{ entry.id }}\" class=\"btn btn-sm btn-warning\">Edit</a>
                        <a href=\"index.php?nav=delete_entry&id={{ entry.id }}\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Are you sure?')\">Delete</a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}

{% block footscripts %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
<script>
    let timer;
    let seconds = 0;
    const timerDisplay = document.getElementById('timerDisplay');
    const startBtn = document.getElementById('startTimer');
    const stopBtn = document.getElementById('stopTimer');
    const saveBtn = document.getElementById('saveTimer');

    function updateTimer() {
        seconds++;
        let hrs = Math.floor(seconds / 3600);
        let mins = Math.floor((seconds % 3600) / 60);
        let secs = seconds % 60;
        timerDisplay.value = `\${hrs.toString().padStart(2, '0')}:\${mins.toString().padStart(2, '0')}:\${secs.toString().padStart(2, '0')}`;
    }

    startBtn.addEventListener('click', () => {
        const now = new Date();
        document.getElementById('startTime').value = now.toTimeString().slice(0, 8);
        timer = setInterval(updateTimer, 1000);
        startBtn.disabled = true;
        stopBtn.disabled = false;
        saveBtn.disabled = false;
    });

    stopBtn.addEventListener('click', () => {
        clearInterval(timer);
        const now = new Date();
        document.getElementById('endTime').value = now.toTimeString().slice(0, 8);
        startBtn.disabled = false;
        stopBtn.disabled = true;
    });

    // Enable Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
{% endblock %}", "pages/dashboard.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\dashboard.twig");
    }
}
