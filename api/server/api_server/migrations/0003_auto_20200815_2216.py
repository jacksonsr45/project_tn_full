# Generated by Django 2.2.15 on 2020-08-16 01:16

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('api_server', '0002_customuser'),
    ]

    operations = [
        migrations.AddField(
            model_name='customuser',
            name='active',
            field=models.BooleanField(default=True),
        ),
        migrations.AddField(
            model_name='customuser',
            name='admin',
            field=models.BooleanField(default=False),
        ),
        migrations.AddField(
            model_name='customuser',
            name='email',
            field=models.EmailField(default='abc123@gmail.com', max_length=255, unique=TabError),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='customuser',
            name='staff',
            field=models.BooleanField(default=False),
        ),
    ]
