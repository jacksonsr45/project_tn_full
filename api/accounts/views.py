from rest_framework import viewsets
from rest_framework import permissions

from .serializers import UserSerializer
from .models import User

class UserViewSet(viewsets.ModelViewSet):
    
    queryset = User.objects.all()
    serializer_class = UserSerializer
    permission_classes = [permissions.IsAuthenticatedOrReadOnly]