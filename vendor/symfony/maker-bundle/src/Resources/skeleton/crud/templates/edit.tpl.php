<?= $helper->getHeadPrintCode('Edit '.$entity_class_name) ?>
{% block body %}
    <h1>{% trans %} Edit <?= $entity_class_name ?>{% endtrans %}</h1>

    {{ include('<?= $templates_path ?>/_form.html.twig', {'button_label': 'Update'}) }}

    <a href="{{ path('<?= $route_name ?>_index') }}"> {% trans %} back to list {% endtrans %}</a>
 
    {{ include('<?= $templates_path ?>/_delete_form.html.twig') }}
{% endblock %}
