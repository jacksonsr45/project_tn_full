from rest_framework import viewsets

from .models import (
    APIUser,
    BAccount,
    BAccountMovimant,
    BWorkOfPiety,
    Travel
)

from .serializers import (
    APIUserSerializer,
    BAccountSerializer,
    BAccountMovimantSerializer,
    BWorkOfPietySerializer,
    TravelSerializer
)

class APIUserViewSet(viewsets.ModelViewSet):
    
    queryset = APIUser.objects.all()
    serializer_class = APIUserSerializer


class BAccountViewSet(viewsets.ModelViewSet):
        
    queryset = BAccount.objects.all()
    serializer_class = BAccountSerializer


class BAccountMovimantViewSet(viewsets.ModelViewSet):
        
    queryset = BAccountMovimant.objects.all()
    serializer_class = BAccountMovimantSerializer


class BWorkOfPietyViewSet(viewsets.ModelViewSet):
        
    queryset = BWorkOfPiety.objects.all()
    serializer_class = BWorkOfPietySerializer


class TravelViewSet(viewsets.ModelViewSet):
        
    queryset = Travel.objects.all()
    serializer_class = TravelSerializer