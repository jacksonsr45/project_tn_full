from django.db import models
from django.contrib.auth.models import (
    AbstractBaseUser,
    BaseUserManager
)

class Base(models.Model):
    criation = models.DateTimeField(auto_now_add=True)
    actualization = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)

    class Meta:
        abstract = True


class UserManager(BaseUserManager):
    def create_user(self, email, password=None, is_staff=False, is_active=True, is_admin=False):
        if not email:
            raise ValueError("User must have an email address")
        if not password:
            raise ValueError("User must have a password")
        user_obj = self.model(
            email = self.normalize_email(email)
        )
        user_obj.set_password(password) # change user password
        user_obj.staff = is_staff
        user_obj.admin = is_admin
        user_obj.active = is_active
        user_obj.save(using=self._db)
        return user_obj

    def create_staffuser(self, email, password=None):
        user = self.create_user(
            email,
            password=password,
            is_staff=True
        )
        return user

    def create_superuser(self, email, password=None):
        user = self.create_user(
            email,
            password=password,
            is_staff=True,
            is_admin=True
        )
        return user


class User(AbstractBaseUser): 
    email = models.EmailField(max_length=255, unique=TabError)
    # full_name = models.CharField(max_length=255, blank=True, null=True)
    active = models.BooleanField(default=True) # can login
    staff = models.BooleanField(default=False) # staff user nom superuser
    admin = models.BooleanField(default=False) # superuser
    timestamp = models.DateTimeField(auto_now_add=True)
    # confirm_email = models.BooleanField(default=False)
    # admin = models.DateTimeField(default=False)

    USERNAME_FIELD = 'email' #username
    # email and passoword are required by default
    REQUIRED_FIELDS = []

    objects = UserManager()

    def __str__(self):
        return self.email

    def get_full_name(self):
        return self.email

    def get_short_name(self):
        return self.email

    @property
    def is_superuser(self):
        return self.is_admin

    @property
    def is_admin(self):
        return self.admin

    @property
    def is_active(self):
        return self.active

    def has_perm(self, perm, obj=None):
        return self.is_superuser

    def has_module_perms(self, app_label):
        return self.is_superuser

    @property
    def is_staff(self):
        return self.staff


class Profile(models.Model):
    user = models.OneToOneField(User,  on_delete=models.CASCADE)
    # extend extra data


class BAccount(Base):
    title = models.CharField(max_length=255)
    account = models.CharField(max_length=255)
    description = models.CharField(max_length=255)
    user_id = models.ForeignKey(User, related_name='baccount_apiuser_name', on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'BAccount'
        verbose_name_plural = 'BAccounts'
        ordering = ['id']


class BAccountMovimant(Base):
    user_id = models.ForeignKey(User, related_name='baccountmovimant_apiuser_name', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BAccount, related_name='baccountmovimant_baccount_account', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 100, decimal_places=2)
    cred = models.DecimalField(max_digits= 100, decimal_places=2)

    class Meta:
        verbose_name = 'BAccountMovimant'
        verbose_name_plural = 'BAccountMovimants'
        ordering = ['id']


class BWorkOfPiety(Base):
    user_id = models.ForeignKey(User, related_name='bworkofpiety_apiuser_name', on_delete=models.CASCADE)
    account_id = models.ForeignKey(BAccount, related_name='bworkofpiety_apiuser_name_baccount_account', on_delete=models.CASCADE)
    historic = models.CharField(max_length=255)
    deb = models.DecimalField(max_digits= 100, decimal_places=2)
    cred = models.DecimalField(max_digits= 100, decimal_places=2)



    class Meta:
        verbose_name = 'BWorkOfPiety'
        verbose_name_plural = 'BWorkOfPietys'
        ordering = ['id']



class Travel(Base):
    user_id = models.ForeignKey(User, related_name='travel_apiuser_name', on_delete=models.CASCADE)
    title = models.CharField(max_length=255)
    collection = models.DecimalField(max_digits= 100,decimal_places=2)
    delivered = models.DecimalField(max_digits= 100,decimal_places=2)
    complementos = models.DecimalField(max_digits= 100,decimal_places=2)
    deposits = models.DecimalField(max_digits= 100,decimal_places=2)
    looting = models.DecimalField(max_digits= 100, decimal_places=2)
    returned = models.DecimalField(max_digits= 100,decimal_places=2)
    expenses = models.DecimalField(max_digits= 100,decimal_places=2)

    class Meta:
        verbose_name = 'Travel'
        verbose_name_plural = 'Travels'
        ordering = ['id']