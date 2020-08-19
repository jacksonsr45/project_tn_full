from rest_framework import viewsets


from .serializers import BankAccountSerializer
from .models import BankAccount

class BankAccountViewSet(viewsets.ModelViewSet):
    
    queryset = BankAccount.objects.all()
    serializer_class = BankAccountSerializer