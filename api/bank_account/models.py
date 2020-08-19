from django.db import models

from base_models.models import  Base
from accounts.models import User
from entities.models import Entities

class BankAccount(Base):
    title = models.CharField(max_length=255)
    account = models.CharField(max_length=255)
    description = models.CharField(max_length=255)
    user_id = models.ForeignKey(User, related_name='bankaccount_id', on_delete=models.CASCADE)
    entity_id = models.ForeignKey(Entities, related_name='bka_entity_id', on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'BankAccount'
        verbose_name_plural = 'BankAccounts'
        ordering = ['id']


    def __str__(self):
        return self.title



class BankAccountMovimant(Base):
    user_id = models.ForeignKey(User, related_name='bka_user_id', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BankAccount, related_name='bank_account', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 100, decimal_places=2)
    cred = models.DecimalField(max_digits= 100, decimal_places=2)

    class Meta:
        verbose_name = 'BankAccountMovimant'
        verbose_name_plural = 'BankAccountMovimants'
        ordering = ['id']