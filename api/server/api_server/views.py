from rest_framework import viewsets

from .models import (
    User,
    BAccount,
    BAccountMovimant,
    BWorkOfPiety,
    Travel
)

from .serializers import (
    UserSerializer,
    BAccountSerializer,
    BAccountMovimantSerializer,
    BWorkOfPietySerializer,
    TravelSerializer
)

#=========================================================
#  View From user 
# #
class UserViewSet(viewsets.ModelViewSet):
    
    queryset = User.objects.all()
    serializer_class = UserSerializer


def token_request(request):
    if user_requested_token() and token_request_is_warranted():
        new_token = Token.objects.create(user=request.user)


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