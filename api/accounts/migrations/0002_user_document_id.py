# Generated by Django 2.2.15 on 2020-08-17 20:46

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('accounts', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='user',
            name='document_id',
            field=models.CharField(blank=True, max_length=255, null=True),
        ),
    ]
