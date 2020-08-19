from rest_framework import routers
from .views import BankAccountViewSet, BankAccountMovimantViewSet

bank_router = routers.DefaultRouter()
bank_router.register(r'bank-contas', BankAccountViewSet)
bank_router.register(r'bank-moviment-contas', BankAccountMovimantViewSet)