from rest_framework import routers
from .views import BankAccountViewSet

bank_router = routers.DefaultRouter()
bank_router.register(r'bank-contas', BankAccountViewSet)