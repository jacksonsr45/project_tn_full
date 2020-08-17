from rest_framework import routers
from .views import UserViewSet

accounts_router = routers.DefaultRouter()
accounts_router.register(r'users', UserViewSet)