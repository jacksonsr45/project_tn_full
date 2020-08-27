from django.contrib import admin
from django.urls import path, include


from accounts.urls import accounts_router
from entities.urls import entity_router
from bank_account.urls import bank_router
from piety_works.urls import piet_router
from travel.urls import travel_router


urlpatterns = [
    path(r'api/v1/', include(accounts_router.urls)),
    path(r'api/v1/', include(entity_router.urls)),
    path(r'api/v1/', include(bank_router.urls)),
    path(r'api/v1/', include(piet_router.urls)),
    path(r'api/v1/entidade/<int:entity_pk>/', include(travel_router.urls)),
    path('admin/', admin.site.urls),
    path('api/v1/', include('rest_auth.urls')),
]
