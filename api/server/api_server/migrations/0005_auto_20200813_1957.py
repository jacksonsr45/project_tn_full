# Generated by Django 2.2.15 on 2020-08-13 22:57

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('api_server', '0004_remove_bworkofpiety_value_total'),
    ]

    operations = [
        migrations.AlterField(
            model_name='baccountmovimant',
            name='cred',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='baccountmovimant',
            name='deb',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='bworkofpiety',
            name='cred',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='bworkofpiety',
            name='deb',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='collection',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='complementos',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='delivered',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='deposits',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='expenses',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='looting',
            field=models.FloatField(),
        ),
        migrations.AlterField(
            model_name='travel',
            name='returned',
            field=models.FloatField(),
        ),
    ]
