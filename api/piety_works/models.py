from django.db import models

from base_models.models import Base
from entities.models import Entities
from accounts.models import User
from bank_account.models import BankAccount

class PietWork(Base):
    entity_piet_work_id = models.ForeignKey(Entities, related_name='piet_work_entity_id', on_delete=models.CASCADE) 
    user_id = models.ForeignKey(User, related_name='piet_work_id', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BankAccount, related_name='bka_piet_work_id', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 100, decimal_places=2)
    cred = models.DecimalField(max_digits= 100, decimal_places=2)

    class Meta:
        verbose_name = 'PietWork'
        verbose_name_plural = 'PietWorks'
        ordering = ['id']