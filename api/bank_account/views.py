from rest_framework import viewsets


from .serializers import BankAccountSerializer, BankAccountMovimantSerializer
from .models import BankAccount, BankAccountMovimant

class BankAccountViewSet(viewsets.ModelViewSet):
    
    queryset = BankAccount.objects.all()
    serializer_class = BankAccountSerializer


class BankAccountMovimantViewSet(viewsets.ModelViewSet):
    
    queryset = BankAccountMovimant.objects.all()
    serializer_class = BankAccountMovimantSerializer