from django.db import models


class Base(models.Model):
    criation = models.DateTimeField(auto_now_add=True)
    actualization = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    class Meta:
        abstract = True



class APIUser(Base):
    name = models.CharField(max_length=255)
    doc_id = models.CharField(max_length=255, unique=True)
    row = models.CharField(max_length=255)
    email = models.EmailField()
    user_pass = models.CharField(max_length=255)

    class Meta:
        verbose_name = 'APIUser'
        verbose_name_plural = 'APIUsers'
        ordering = ['id']


class BAccount(Base):
    title = models.CharField(max_length=255)
    account = models.CharField(max_length=255)
    description = models.CharField(max_length=255)
    user_id = models.ForeignKey(APIUser, related_name='baccount_apiuser_name', on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'BAccount'
        verbose_name_plural = 'BAccounts'
        ordering = ['id']


class BAccountMovimant(Base):
    user_id = models.ForeignKey(APIUser, related_name='baccountmovimant_apiuser_name', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BAccount, related_name='baccountmovimant_baccount_account', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 2, decimal_places=2)
    cred = models.DecimalField(max_digits= 2, decimal_places=2)

    class Meta:
        verbose_name = 'BAccountMovimant'
        verbose_name_plural = 'BAccountMovimants'
        ordering = ['id']


class BWorkOfPiety(Base):
    user_id = models.ForeignKey(APIUser, related_name='bworkofpiety_apiuser_name', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BAccount, related_name='bworkofpiety_apiuser_name_baccount_account', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 2, decimal_places=2)
    cred = models.DecimalField(max_digits= 2, decimal_places=2)
    value_total = models.DecimalField(max_digits= 2,decimal_places=2)


    class Meta:
        verbose_name = 'BWorkOfPiety'
        verbose_name_plural = 'BWorkOfPietys'
        ordering = ['id']



class Travel(Base):
    user_id = models.ForeignKey(APIUser, related_name='travel_apiuser_name', on_delete=models.CASCADE)
    title = models.CharField(max_length=255)
    collection = models.DecimalField(max_digits= 2,decimal_places=2)
    delivered = models.DecimalField(max_digits= 2,decimal_places=2)
    complementos = models.DecimalField(max_digits= 2,decimal_places=2)
    deposits = models.DecimalField(max_digits= 2,decimal_places=2)
    looting = models.DecimalField(max_digits= 2, decimal_places=2)
    returned = models.DecimalField(max_digits= 2,decimal_places=2)
    expenses = models.DecimalField(max_digits= 2,decimal_places=2)

    class Meta:
        verbose_name = 'Travel'
        verbose_name_plural = 'Travels'
        ordering = ['id']