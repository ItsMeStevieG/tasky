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

/* base.twig */
class __TwigTemplate_a722286a626b67de03b46302c7794be6 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'headscripts' => [$this, 'block_headscripts'],
            'content' => [$this, 'block_content'],
            'footscripts' => [$this, 'block_footscripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\" data-theme=\"";
        // line 2
        if ((($context["theme"] ?? null) == "dark")) {
            yield "dark";
        } else {
            yield "light";
        }
        yield "\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    ";
        // line 9
        yield from $this->loadTemplate("partials/headscripts.twig", "base.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "    ";
        yield from $this->unwrap()->yieldBlock('headscripts', $context, $blocks);
        // line 11
        yield "</head>

<body>
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"index.php?nav=dashboard\">Tasky</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav me-auto\">
                    ";
        // line 22
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "isLoggedIn", [], "any", false, false, false, 22)) {
            // line 23
            yield "                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=dashboard\">Dashboard</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=projects\">Projects</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=tags\">Tags</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=reports\">Reports</a>
                    </li>
                    ";
            // line 35
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "isAdmin", [], "any", false, false, false, 35)) {
                // line 36
                yield "                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=users\">Users</a>
                    </li>
                    ";
            }
            // line 40
            yield "                    ";
        }
        // line 41
        yield "                </ul>
                <ul class=\"navbar-nav align-items-center\">
                    <li class=\"nav-item\">
                        <button id=\"themeToggle\" class=\"btn btn-outline-secondary me-2\" style=\"height: 30px; width: 30px; padding: 0; display: flex; align-items: center; justify-content: center;\">
                            <i id=\"themeIcon\" class=\"bi bi-sun-fill\" style=\"font-size: 1rem;\"></i>
                        </button>
                    </li>
                    ";
        // line 48
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "isLoggedIn", [], "any", false, false, false, 48)) {
            // line 49
            yield "                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=profile\">
                            ";
            // line 51
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getProfilePicture", [], "any", false, false, false, 51)) {
                // line 52
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getProfilePicture", [], "any", false, false, false, 52), "html", null, true);
                yield "\" alt=\"Profile Picture\" class=\"rounded-circle me-2\" style=\"width: 30px; height: 30px; object-fit: cover;\">
                            ";
            }
            // line 54
            yield "                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["full_name"] ?? null), "html", null, true);
            yield "
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"index.php?nav=logout\">
                            <i class=\"bi bi-box-arrow-right me-1\"></i> Logout
                        </a>
                    </li>
                    ";
        }
        // line 63
        yield "                </ul>
            </div>
        </div>
    </nav>
    <div class=\"container mt-5\">
        ";
        // line 68
        if (($context["error"] ?? null)) {
            // line 69
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 71
        yield "        ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 72
        yield "    </div>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js\"></script>
    ";
        // line 75
        yield from $this->unwrap()->yieldBlock('footscripts', $context, $blocks);
        // line 161
        yield "</body>

</html>";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Tasky";
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_headscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 71
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 75
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 76
        yield "    <script>
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

        // Cropper.js logic (only on profile page)
        if (document.getElementById('profile_picture')) {
            const imageInput = document.getElementById('profile_picture');
            const imageToCrop = document.getElementById('imageToCrop');
            const cropButton = document.getElementById('cropButton');
            const croppedImageInput = document.getElementById('croppedImage');
            let cropper;

            imageInput.addEventListener('change', (e) => {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        imageToCrop.src = event.target.result;
                        const modal = new bootstrap.Modal(document.getElementById('cropModal'));
                        modal.show();

                        // Initialize Cropper.js
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(imageToCrop, {
                            aspectRatio: 1,
                            viewMode: 1,
                            autoCropArea: 0.8,
                            responsive: true,
                            zoomable: true,
                            scalable: true,
                            movable: true,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            cropButton.addEventListener('click', () => {
                if (cropper) {
                    const canvas = cropper.getCroppedCanvas({
                        width: 200,
                        height: 200,
                    });
                    canvas.toBlob((blob) => {
                        const reader = new FileReader();
                        reader.onloadend = () => {
                            croppedImageInput.value = reader.result;
                            const modal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
                            modal.hide();
                            // Reset the file input to allow re-uploading
                            imageInput.value = '';
                        };
                        reader.readAsDataURL(blob);
                    }, 'image/jpeg');
                }
            });

            // Clean up Cropper.js when modal is closed
            document.getElementById('cropModal').addEventListener('hidden.bs.modal', () => {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                imageToCrop.src = '';
            });
        }
    </script>
    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.twig";
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
        return array (  217 => 76,  210 => 75,  200 => 71,  190 => 10,  179 => 7,  172 => 161,  170 => 75,  165 => 72,  162 => 71,  156 => 69,  154 => 68,  147 => 63,  134 => 54,  128 => 52,  126 => 51,  122 => 49,  120 => 48,  111 => 41,  108 => 40,  102 => 36,  100 => 35,  86 => 23,  84 => 22,  71 => 11,  68 => 10,  66 => 9,  61 => 7,  49 => 2,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "base.twig", "C:\\xampp\\htdocs\\tasky\\templates\\base.twig");
    }
}
