<?= $helper->getHeadPrintCode($entity_class_name.' index'); ?>

{% block body %}
    <h1><?= $entity_class_name ?> index</h1>
{% include 'tab.html.twig' %}
    <table class="table">
        <thead>
            <tr>
<?php foreach ($entity_fields as $field): ?>
                <th><?= ucfirst($field['fieldName']) ?></th>
<?php endforeach; ?>
                <th>{% trans %}actions{% endtrans %}</th>
            </tr>
        </thead>
        <tbody>
        {% for <?= $entity_twig_var_singular ?> in <?= $entity_twig_var_plural ?> %}
            <tr>
<?php foreach ($entity_fields as $field): ?>
                <td>{{ <?= $helper->getEntityFieldPrintCode($entity_twig_var_singular, $field) ?> }}</td>
<?php endforeach; ?>
                <td>
                    <a href="{{ path('<?= $route_name ?>_show', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}">{% trans %}show{% endtrans %}</a>
                    <a href="{{ path('<?= $route_name ?>_edit', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}">{% trans %}edit{% endtrans %}</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan="<?= (count($entity_fields) + 1) ?>">{% trans %}no records found{% endtrans %}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href="{{ path('<?= $route_name ?>_new') }}">{% trans %}Create new{% endtrans %}</a>
{% endblock %}
