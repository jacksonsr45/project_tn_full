# Generated by Django 2.2.15 on 2020-08-19 01:48

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('bank_account', '0003_bankaccountmovimant'),
    ]

    operations = [
        migrations.AddField(
            model_name='bankaccount',
            name='commit',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='bankaccountmovimant',
            name='commit',
            field=models.TextField(null=True),
        ),
    ]
