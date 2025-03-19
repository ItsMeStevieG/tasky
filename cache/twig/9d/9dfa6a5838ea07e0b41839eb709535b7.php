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

/* pages/profile.twig */
class __TwigTemplate_6e391ead0642ef57d6aed047658b0b8c extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "pages/profile.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Profile - Tasky";
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
    <div class=\"card-header\">Your Profile</div>
    <div class=\"card-body\">
        <form method=\"POST\" action=\"index.php?nav=profile\" enctype=\"multipart/form-data\" id=\"profileForm\">
            <input type=\"hidden\" name=\"csrf_token\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getCsrfToken", [], "method", false, false, false, 10), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"action\" value=\"update_profile\">
            <input type=\"hidden\" name=\"cropped_image\" id=\"croppedImage\">
            <div class=\"mb-3\">
                <label for=\"full_name\" class=\"form-label\">Full Name</label>
                <input type=\"text\" class=\"form-control\" id=\"full_name\" name=\"full_name\" value=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["full_name"] ?? null), "html", null, true);
        yield "\" required>
            </div>
            <div class=\"mb-3\">
                <label for=\"password\" class=\"form-label\">New Password (leave blank to keep current)</label>
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">
            </div>
            <div class=\"mb-3\">
                <label for=\"profile_picture\" class=\"form-label\">Profile Picture</label>
                <input type=\"file\" class=\"form-control\" id=\"profile_picture\" name=\"profile_picture\" accept=\"image/*\">
                ";
        // line 24
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getProfilePicture", [], "any", false, false, false, 24)) {
            // line 25
            yield "                <div class=\"mt-2\">
                    <img src=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "getProfilePicture", [], "any", false, false, false, 26), "html", null, true);
            yield "\" alt=\"Current Profile Picture\" class=\"rounded-circle profile-picture\">
                </div>
                ";
        }
        // line 29
        yield "            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Update Profile</button>
        </form>
    </div>
</div>

<!-- Crop Modal -->
<div class=\"modal fade\" id=\"cropModal\" tabindex=\"-1\" aria-labelledby=\"cropModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"cropModalLabel\">Crop Profile Picture</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <img id=\"imageToCrop\" src=\"\" alt=\"Image to Crop\">
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Cancel</button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"cropButton\">Crop and Save</button>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 55
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footscripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 56
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

    // Cropper.js logic
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
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/profile.twig";
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
        return array (  144 => 56,  137 => 55,  108 => 29,  102 => 26,  99 => 25,  97 => 24,  85 => 15,  77 => 10,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pages/profile.twig", "C:\\xampp\\htdocs\\tasky\\templates\\pages\\profile.twig");
    }
}
