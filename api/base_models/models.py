from django.db import models

class Base(models.Model):
    criation = models.DateTimeField(auto_now_add=True)
    actualization = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    class Meta:
        abstract = True