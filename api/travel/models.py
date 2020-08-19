from django.db import models

from base_models.models import Base
from entities.models import Entities
from accounts.models import User

class Travel(Base):
    entity_travel_id = models.ForeignKey(Entities, related_name='travel_id', on_delete=models.CASCADE) 
    user_id = models.ForeignKey(User, related_name='travel_id', on_delete=models.CASCADE)
    title = models.CharField(max_length=255)
    collection = models.DecimalField(max_digits= 100,decimal_places=2)
    delivered = models.DecimalField(max_digits= 100,decimal_places=2)
    complementos = models.DecimalField(max_digits= 100,decimal_places=2)
    deposits = models.DecimalField(max_digits= 100,decimal_places=2)
    looting = models.DecimalField(max_digits= 100, decimal_places=2)
    returned = models.DecimalField(max_digits= 100,decimal_places=2)
    expenses = models.DecimalField(max_digits= 100,decimal_places=2)
    total = models.DecimalField(max_digits= 100,decimal_places=2)

    class Meta:
        verbose_name = 'Travel'
        verbose_name_plural = 'Travels'
        ordering = ['id']